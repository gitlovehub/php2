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
        $product = $this->product->getCategoryName();
        $sliced_list = array_slice($product, 0, 4);
        $this->renderViewClient('home', [
            'products' => $sliced_list,
        ]);
    }
}