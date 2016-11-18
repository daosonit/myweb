<?php namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class NavigateFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'navigation';
    }
}
