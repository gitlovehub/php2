<?php 

namespace MyNamespace\MyProject\Controllers\Client;

use MyNamespace\MyProject\Common\Controller;

class HomeController extends Controller
{
    public function index() {
        $name = 'Trần Văn Tèo';

        $this->renderViewClient('home', [
            'name' => $name
        ]);
    }
}