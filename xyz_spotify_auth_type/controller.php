<?php
namespace Concrete\Package\XyzSpotifyAuthType;

defined('C5_EXECUTE') or die('Access Denied.');

use Package;
use AuthenticationType;
use \Concrete\Package\XyzSpotifyAuthType\Src\Authentication\Type\Spotify\ServiceProvider;

class Controller extends Package
{
    protected $pkgHandle = 'xyz_spotify_auth_type';
    protected $appVersionRequired = '5.7.5.8';
    protected $pkgVersion = '0.0015';
    protected $pkgAutoloaderMapCoreExtensions = true;

    public function getPackageDescription()
    {
        return t('Package to extend Authentication Types, adds the Spotify Authentication Type, brought to you by Xyz.');
    }

    public function getPackageName()
    {
        return t('Spotify Auth Type');
    }

	public function on_start()
    {
        $app = \Core::make('authentication/spotify');
        $provider = new ServiceProvider($app);
        $provider->register();
    }

    public function install()
    {
        $pkg = parent::install();
        AuthenticationType::add('spotify', 'Spotify', $pkg);
    }
	
	public function uninstall()
    {
        parent::uninstall();
		//$type = AuthenticationType::getByHandle('spotify');
		//$type->delete();
    }
	
}
