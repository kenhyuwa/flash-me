<?php 

namespace Ken\FlashMe;

use Ken\FlashMe\Flasher\Flasher;
use Illuminate\Support\ServiceProvider;

class FlashMeServiceProvider extends ServiceProvider
{
	/**
	 * booting of services.
	 * @return void
	 */
	public function boot()
	{
	    	$this->publishes([
	        	__DIR__.'/../config' => config_path('flash_me.php'),
	    	], 'config');
	    	$this->publishes([
	        	__DIR__.'/../lang/en' => resource_path('lang/en'),
	    	], 'resources');
	}
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('flashMe', function ($app) {
            	return $this->app->make(Flasher::class);
        });
        require_once(__DIR__ . '/Helpers/flashMe.php');
    }
}
