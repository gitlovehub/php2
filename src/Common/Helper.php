<?php 

namespace MyNamespace\MyProject\Common;

class Helper
{
    public static function debug($data) {
        echo '<pre>';
        print_r($data);
        die;
    }
}