<?php

namespace Morpheusadam\Elanak\Facades;

 
class Elanak extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        // Replace 'elanak' with the name of the binding you set in the register method of your service provider
        return 'elanak';
    }
}
