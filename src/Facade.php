<?php

namespace ArsumCom\Dopamine;

use Illuminate\Support\Facades\Facade as BaseFacade;

class Facade extends BaseFacade
{
  /**
   * The name of the binding in the IoC container.
   *
   * @return string
   */
  protected static function getFacadeAccessor()
  {
    return 'dopamine';
  }
}