<?php
/**
 * Created by PhpStorm.
 * User: goku
 * Date: 1/10/15
 * Time: 8:25 PM
 */

class ImageController extends Illuminate\Routing\Controller
{
    public function show($resource="")
    {
        $package = base_path('vendor/allovince/evathumber');
        $setting = include $package . "/config.default.php";
        $evathumberConfig = new EvaThumber\Config\Config($setting);
        $url = new EvaThumber\Url(null, $evathumberConfig);

        var_dump($url->getUrlImageName());
    }
}