<?php
/**
 * OAuth 2.0 Implicit code grant
 *
 * @package     league/oauth2-server
 * @author      David Walker <dwalker@symplicity.com>
 * @copyright   Copyright (c) David Walker
 * @license     http://mit-license.org/
 * @link        https://github.com/thephpleague/oauth2-server
 */

use League\OAuth2\Server\Grant\AbstractGrant;
use League\OAuth2\Server\Entity\AccessTokenEntity;
use League\OAuth2\Server\Entity\ClientEntity;
use League\OAuth2\Server\Entity\SessionEntity;
use League\OAuth2\Server\Event;
use League\OAuth2\Server\Exception;
use League\OAuth2\Server\Util\SecureKey;
/**
 * Implicit grant class
 */
class ImplicitGrant extends AbstractGrant
{
    /**
     * Grant identifier
     *
     * @var string
     */
    protected $identifier = 'implicit';
    /**
     * Response type
     *
     * @var string
     */
    protected $responseType = 'token';
    /**
     * AuthServer instance
     *
     * @var \League\OAuth2\Server\AuthorizationServer
     */
    protected $server = null;
    /**
     * Access token expires in override
     *
     * @var int
     */
    protected $accessTokenTTL = null;

    /**
     * Complete the flow. - invalid for this case
     *
     * @return null
     */
    public function completeFlow()
    {
        // Get required params
        if (!isset($params['client']) || ($params['client'] instanceof ClientEntity) === false) {
            $this->server->getEventEmitter()->emit(new Event\ClientAuthenticationFailedEvent($this->server->getRequest()));
            throw new Exception\InvalidClientException();
        }
        $client = $params['client'];
        if (!isset($params['redirect_uri']) || is_null($params['redirect_uri'])) {
            throw new Exception\InvalidRequestException('redirect_uri');
        }
        $redirectUri = $params['redirect_uri'];
        // Create a new session
        $session = new SessionEntity($this->server);
        $session->setOwner('implicit', $client->getId());
        $session->associateClient($client);
        // Generate the access token
        $accessToken = new AccessTokenEntity($this->server);
        $accessToken->setId(SecureKey::generate());
        $accessToken->setExpireTime($this->getAccessTokenTTL() + time());
        if (isset($params['scopes'])) {
            foreach ($params['scopes'] as $implicitScope) {
                $session->associateScope($implicitScope);
            }
            foreach ($session->getScopes() as $scope) {
                $accessToken->associateScope($scope);
            }
        }
        $this->server->getTokenType()->setSession($session);
        $this->server->getTokenType()->setParam('access_token', $accessToken->getId());
        $this->server->getTokenType()->setParam('expires_in', $this->getAccessTokenTTL());
        // Save all the things
        $session->save();
        $accessToken->setSession($session);
        $accessToken->save();
        $token = $this->server->getTokenType()->generateResponse();
        if (isset($params['state']) && $params['state']) {
            $token['state'] = $params['state'];
        }
        $response = $this->server->getTokenType()->generateResponse();
        $response['redirect_uri'] = $params['redirect_uri'];

        return $response;
    }
}