<?php 

namespace MyNamespace\MyProject\Controllers\Client;

use MyNamespace\MyProject\Common\Controller;
use MyNamespace\MyProject\Models\Category;
use MyNamespace\MyProject\Models\Product;

class ProductController extends Controller
{

    private Category $category;
    private Product $product;
    public function __construct() {
        $this->category = new Category();
        $this->product = new Product();
    }

    public function index() {
        $product = $this->product->read();
        $category = $this->category->read();
        $this->renderViewClient('product', [
            'products' => $product,
            'categories' => $category,
        ]);
    }

    public function detail($id) {

    }
}