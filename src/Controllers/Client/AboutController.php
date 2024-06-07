<?php 

namespace MyNamespace\MyProject\Controllers\Client;

use MyNamespace\MyProject\Common\Controller;

class AboutController extends Controller
{
    public function index() {
        echo __CLASS__ . '@' . __FUNCTION__;
    }
}