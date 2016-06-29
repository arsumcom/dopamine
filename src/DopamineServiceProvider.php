<?php

namespace ArsumCom\Dopamine;

use Illuminate\Support\ServiceProvider;

class DopamineServiceProvider extends ServiceProvider
{
  /**
   * Indicates if loading of the provider is deferred.
   *
   * @var bool
   */
  //protected $defer = true;

  /**
   * Perform post-registration booting of services.
   *
   * @return void
   */
  public function boot()
  {
    $this->mergeConfigFrom(
      __DIR__ . '/config/dopamine.php', 'services'
    );
  }

  /**
   * Register any package services.
   *
   * @return void
   */
  public function register()
  {
    $this->app->bind('dopamine', 'ArsumCom\Dopamine\Dopamine');
  }
}