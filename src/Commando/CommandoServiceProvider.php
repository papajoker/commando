<?php

namespace Commando;

use Illuminate\Support\ServiceProvider;

class CommandoServiceProvider extends ServiceProvider {


	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->registerProfilerCommand();
		$this->commands( 'commando.config'	);
	}
	
	/**
	 * Register the command cli.
	 *
	 * @return void
	 */	
	public function registerProfilerCommand()
	{
		$this->app['commando.config'] = $this->app->share(function($app)
		{
			return new TestCommande();
		});
	}	

}
