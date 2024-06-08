<?php 

namespace MyNamespace\MyProject\Controllers\Admin;

use MyNamespace\MyProject\Common\Controller;
use MyNamespace\MyProject\Common\Helper;
use MyNamespace\MyProject\Models\Category;
use MyNamespace\MyProject\Models\Product;
use Rakit\Validation\Validator;

class ProductController extends Controller
{
    private Product $product;
    private Category $category;

    public function __construct() {
        $this->product = new Product();
        $this->category = new Category();
    }

    public function index() {
        $paginatedData = $this->product->paginateProducts(1, 5);
        $list = $paginatedData[0]; // Extracting the paginated data
        $this->renderViewAdmin('products.index', [
            'list' => $list
        ]);
    }

    public function show($id) {
        $product = $this->product->findByID($id);
        $this->renderViewAdmin('products.show', [
            'product' => $product
        ]);
    }

    public function create() {
        $categories = $this->category->read();
        $categoryName = array_column($categories, 'name', 'id');
        $this->renderViewAdmin('products.create', [
            'categoryName' => $categoryName
        ]);
    }

    public function store() {
        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'category_id'      => 'required',
            'name'             => 'required|max:50',
            'description'      => 'required|max:255',
            'price'            => 'required|numeric|min:0.01',
            'thumbnail'        => 'uploaded_file|max:1073741824|mimes:png,jpg,jpeg',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url('admin/products/create'));
            exit;
        } else {
            $data = [
                'name'            => $_POST['name'],
                'description'     => $_POST['description'],
                'price'           => $_POST['price'],
                'category_id'     => $_POST['category_id'],
            ];

            if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['size'] > 0) {

                $from = $_FILES['thumbnail']['tmp_name'];
                $to = 'assets/uploads/' . time() . $_FILES['thumbnail']['name'];

                if (move_uploaded_file($from, PATH_ROOT . $to)) {
                    $data['thumbnail'] = $to;
                } else {
                    $_SESSION['errors']['thumbnail'] = 'Tải lên thất bại!';

                    header('Location: ' . url('admin/products/create'));
                    exit;
                }
            }

            $this->product->insert($data);

            $_SESSION['alert'] = true;
            $_SESSION['msg'] = 'Tải lên thành công 🎉';

            header('Location: ' . url('admin/products'));
            exit;
        }
    }

    public function edit($id) {
        $product = $this->product->findByID($id);
        $categories = $this->category->read();

        $categoryName = array_column($categories, 'name', 'id');

        $this->renderViewAdmin('products.edit', [
            'product' => $product,
            'categoryName' => $categoryName,
        ]);
    }

    public function update($id) {
            $product = $this->product->findByID($id);
    
            $validator = new Validator;
            $validation = $validator->make($_POST + $_FILES, [
                'category_id'      => 'required',
                'name'             => 'required|max:50',
                'description'      => 'required|max:255',
                'price'            => 'required|numeric|min:0.01',
                'thumbnail'        => 'uploaded_file|max:1073741824|mimes:png,jpg,jpeg',
            ]);
            $validation->validate();
    
            if ($validation->fails()) {
                $_SESSION['errors'] = $validation->errors()->firstOfAll();
    
                header('Location: ' . url("admin/products/{$product['id']}/edit"));
                exit;
            } else {
                $data = [
                    'name'            => $_POST['name'],
                    'description'     => $_POST['description'],
                    'price'           => $_POST['price'],
                    'category_id'     => $_POST['category_id'],
                ];
    
                $flagUpload = false;
                if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['size'] > 0) {
    
                    $flagUpload = true;
    
                    $from = $_FILES['thumbnail']['tmp_name'];
                    $to = 'assets/uploads/' . time() . $_FILES['thumbnail']['name'];
    
                    if (move_uploaded_file($from, PATH_ROOT . $to)) {
                        $data['thumbnail'] = $to;
                    } else {
                        $_SESSION['errors']['thumbnail'] = 'Cập nhật thất bại!';
    
                        header('Location: ' . url("admin/products/{$product['id']}/edit"));
                        exit;
                    }
                }
    
                $this->product->update($id, $data);
    
                if (
                    $flagUpload
                    && $product['thumbnail']
                    && file_exists(PATH_ROOT . $product['thumbnail'])
                ) {
                    unlink(PATH_ROOT . $product['thumbnail']);
                }
    
                $_SESSION['alert'] = true;
                $_SESSION['msg'] = 'Cập nhật thành công 🎉';
    
                header('Location: ' . url("admin/products/{$product['id']}/edit"));
                exit;
            }
    }

    public function delete($id) {
        try {
            $this->product->delete($id);
            $_SESSION['alert'] = true;
            $_SESSION['msg'] = 'Thao tác thành công 🎉';
        } catch (\Throwable $th) {
            $_SESSION['alert'] = false;
            $_SESSION['msg'] = 'Thao tác KHÔNG thành công!';
        }
        header('Location: ' . url('admin/products'));
        exit();
    }
}