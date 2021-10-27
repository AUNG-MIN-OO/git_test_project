<?php


namespace App;


class Base
{
    public  static $name = "IT News";
    public  static $logo = 'images/logos/logo.PNG';
    public  static $description = "SSR blog project with laravel";

    public static function showName(){
        return "Admin";
    }
}
