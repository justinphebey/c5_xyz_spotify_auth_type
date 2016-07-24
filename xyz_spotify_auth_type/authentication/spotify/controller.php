<?php
namespace Concrete\Package\XyzSpotifyAuthType\Authentication\Spotify;

defined('C5_EXECUTE') or die('Access Denied');

use Concrete\Core\Authentication\Type\OAuth\OAuth2\GenericOauth2TypeController;
use Concrete\Package\XyzSpotifyAuthType\OAuth\OAuth2\Service\Spotify;

class Controller extends GenericOauth2TypeController
{

    public function registrationGroupID()
    {
        return \Config::get('auth.spotify.registration.group');
    }

    public function supportsRegistration()
    {
        return \Config::get('auth.spotify.registration.enabled', false);
    }

    public function getAuthenticationTypeIconHTML()
    {
        return '<i class="fa fa-spotify"></i>';
    }

    public function getHandle()
    {
        return 'spotify';
    }

    /**
     * @return Spotify
     */
    public function getService()
    {
        if (!$this->service) {
            $this->service = \Core::make('authentication/spotify');
        }
        return $this->service;
    }

    public function saveAuthenticationType($args)
    {
        \Config::save('auth.spotify.appid', $args['apikey']);
        \Config::save('auth.spotify.secret', $args['apisecret']);
        \Config::save('auth.spotify.registration.enabled', !!$args['registration_enabled']);
        \Config::save('auth.spotify.registration.group', intval($args['registration_group'], 10));
    }

    public function edit()
    {
        $this->set('form', \Loader::helper('form'));
        $this->set('apikey', \Config::get('auth.spotify.appid', ''));
        $this->set('apisecret', \Config::get('auth.spotify.secret', ''));

        $list = new \GroupList();
        $list->includeAllGroups();
        $this->set('groups', $list->getResults());
    }

}
