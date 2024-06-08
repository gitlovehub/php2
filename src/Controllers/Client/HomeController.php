<?php 

namespace MyNamespace\MyProject\Controllers\Client;
use MyNamespace\MyProject\Common\Controller;
use MyNamespace\MyProject\Models\Product;

class HomeController extends Controller
{
    private Product $product;
    public function __construct() {
        $this->product = new Product();
    }

    public function index() {
        $list = $this->product->read();
        $sliced_list = array_slice($list, 0, 4);
        $this->renderViewClient('home', [
            'list' => $sliced_list,
        ]);
    }
}