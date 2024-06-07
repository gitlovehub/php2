<?php 

namespace MyNamespace\MyProject\Controllers\Client;

use MyNamespace\MyProject\Common\Controller;

class ContactController extends Controller
{
    public function index() {
        echo __CLASS__ . '@' . __FUNCTION__;
    }

    public function store() {
        echo __CLASS__ . '@' . __FUNCTION__;
    }
}