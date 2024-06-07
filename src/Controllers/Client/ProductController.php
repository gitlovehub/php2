<?php 

namespace MyNamespace\MyProject\Controllers\Client;

use MyNamespace\MyProject\Common\Controller;

class ProductController extends Controller
{
    public function index() {
        echo __CLASS__ . '@' . __FUNCTION__;
    }

    public function detail($id) {
        echo __CLASS__ . '@' . __FUNCTION__ . '@' . $id;
    }
}