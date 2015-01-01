{{ Form::open(array('url'=> URL::action('App\Controllers\OAuth\OAuthController@postAuthorize') . '?' . $params)) }}
{{ Form::hidden('approve',1) }}
{{ Form::submit('Approve', array('class'=>'btn btn-large btn-primary')) }}
{{ Form::close() }}
