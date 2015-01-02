<?php
use Swagger\Annotations as SWG;

/**
 * @SWG\Info(
 *     title="GKCommerce HTTP REST API",
 *     description="GKCommerce",
 *     termsOfServiceUrl="http://gkcommerce.com",
 *     contact="hello@gokucommerce.com",
 *     license="",
 *     licenseUrl=""
 * )
 *
 * @SWG\Authorization(
 *     type="oauth2",
 *     @SWG\Scope(scope="write:address", description="Modify address in your account"),
 *     @SWG\Scope(scope="read:address", description="Read your address"),
 *     grantTypes={
 *         "implicit": {
 *             "loginEndpoint": {
 *                 "url": "http://127.0.0.1:8000/oauth/authorize"
 *             },
 *             "tokenName": "access_token"
 *         },
 *	       "authorization_code": {
 *             "tokenRequestEndpoint": {
 *                 "url": "http://127.0.0.1:8000/oauth/authorize",
 *                 "clientIdName": "client_id",
 *                 "clientSecretName": "client_secret",
 *             },
 *             "tokenEndpoint": {
 *                 "url": "http://127.0.0.1:8000/oauth/access_token",
 *                 "tokenName": "access_token",
 *             }
 *         }
 *     }
 * )
 */
