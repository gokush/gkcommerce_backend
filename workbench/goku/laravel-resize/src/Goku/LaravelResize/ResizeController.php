<?php namespace Goku\LaravelResize;
/**
 * Created by PhpStorm.
 * User: goku
 * Date: 1/10/15
 * Time: 8:52 PM
 */

class ResizeController extends \Illuminate\Routing\Controller
{
    public function show($resource='')
    {
        $package = base_path('vendor/allovince/evathumber');
        $setting = \Config::get("laravel-resize::resize");
        $evathumberConfig = new \EvaThumber\Config\Config($setting);
        $url = new \EvaThumber\Url(null, $evathumberConfig);
        $thumber = new \EvaThumber\Thumber($setting);
        $thumber->show();
    }
}