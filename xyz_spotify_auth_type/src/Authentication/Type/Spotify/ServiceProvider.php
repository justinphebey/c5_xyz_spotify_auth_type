<?php
namespace Concrete\Package\XyzSpotifyAuthType\Src\Authentication\Type\Spotify;

use \OAuth\Common\Consumer\Credentials;
use \OAuth\Common\Storage\SymfonySession;
use \OAuth\ServiceFactory;

class ServiceProvider extends \Concrete\Core\Foundation\Service\Provider
{
    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->bindShared(
            'authentication/spotify',
            function ($app, $callback = '/ccm/system/authentication/oauth2/spotify/callback/') {
                /* @var ServiceFactory $factory */
                $config = $app->make('config');
                $factory = $app->make('oauth/factory/service', array(CURLOPT_SSL_VERIFYPEER => $config->get('app.curl.verifyPeer')));

                return $factory->createService(
                    'spotify',
                    new Credentials(
                        $config->get('auth.spotify.appid'),
                        $config->get('auth.spotify.secret'),
                        (string) \URL::to($callback)
                    ),
                    new SymfonySession(\Session::getFacadeRoot(), false),
                    array('user-read-email'));
            }
        );
    }
}