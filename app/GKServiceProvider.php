<?php namespace App;
/**
 * Created by PhpStorm.
 * User: goku
 * Date: 1/10/15
 * Time: 2:22 PM
 */

use Illuminate\Support\ServiceProvider;

class GKServiceProvider extends ServiceProvider
{
    public function register()
    {
        \App::bind('ProductRepository', '\ProductRepository');
    }
}