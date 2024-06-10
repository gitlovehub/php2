<?php 

namespace MyNamespace\MyProject\Controllers\Client;

use MyNamespace\MyProject\Common\Controller;
use MyNamespace\MyProject\Common\Helper;
use MyNamespace\MyProject\Models\Category;
use MyNamespace\MyProject\Models\Product;

class ProductController extends Controller
{

    private Product $product;
    private Category $category;
    public function __construct() {
        $this->product = new Product();
        $this->category = new Category();
    }

    public function shop() {
        $category = $this->category->read();
        $page = $_GET["page"] ?? 1;
        [$product, $totalPage] = $this->product->paginateClientProducts($page);
        $this->renderViewClient('shop', [
            'products' => $product,
            'categories' => $category,
            'totalPages' => $totalPage,
            'currentPage' => $page,
        ]);
    }

    public function detail($id) {
        $product = $this->product->findByProductID($id);
        $relatedProduct = $this->product->getRelatedProducts($product['category_id']);
        // Loại bỏ sản phẩm hiện tại khỏi mảng
        foreach ($relatedProduct as $key => $value) {
            if ($value['id'] == $id) {
                unset($relatedProduct[$key]);
            }
        }
        
        $this->renderViewClient('product-detail', [
            'product' => $product,
            'relatedProducts' => $relatedProduct,
        ]);
    }

    public function cate($categoryId) {
        $category = $this->category->read();
        $categoryName = $this->category->findByID($categoryId);
        $productCategory = $this->product->getRelatedProducts($categoryId);
        $this->renderViewClient('category', [
            'title' => $categoryName,
            'categories' => $category,
            'productCategories' => $productCategory,
        ]);
    }

    public function search() {
        $keyword = $_POST["keyword"];
        $category = $this->category->read();
        $product = $this->product->searchProductsByName($keyword);
        $this->renderViewClient('category', [
            'keyword' => $keyword,
            'categories' => $category,
            'productCategories' => $product,
        ]);
    }
}