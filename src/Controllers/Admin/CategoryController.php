<?php 

namespace MyNamespace\MyProject\Controllers\Admin;

use MyNamespace\MyProject\Common\Controller;
use MyNamespace\MyProject\Models\Category;
use Rakit\Validation\Validator;

class CategoryController extends Controller
{
    private Category $category;
    public function __construct() {
        $this->category = new Category();
    }

    public function index() {
        $list = $this->category->read();
        $this->renderViewAdmin('categories.index', [
            'list' => $list
        ]);
    }

    public function create() {
        $this->renderViewAdmin('categories.create');
    }

    public function store() {
        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'name'             => 'required|max:50',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url('admin/categories/create'));
            exit;
        } else {
            $data = [
                'name' => $_POST['name'],
            ];

            $this->category->insert($data);

            $_SESSION['alert'] = true;
            $_SESSION['msg'] = 'Tải lên thành công 🎉';

            header('Location: ' . url('admin/categories'));
            exit;
        }
    }

    public function edit($id) {
        $category = $this->category->findByID($id);
        $this->renderViewAdmin('categories.edit', [
            'category' => $category
        ]);
    }

    public function update($id) {
            $category = $this->category->findByID($id);
    
            $validator = new Validator;
            $validation = $validator->make($_POST + $_FILES, [
                'name'                  => 'required|max:50',
            ]);
            $validation->validate();
    
            if ($validation->fails()) {
                $_SESSION['errors'] = $validation->errors()->firstOfAll();
    
                header('Location: ' . url("admin/categories/{$category['id']}/edit"));
                exit;
            } else {
                $data = [
                    'name' => $_POST['name'],
                ];
    
                $this->category->update($id, $data);
    
                $_SESSION['alert'] = true;
                $_SESSION['msg'] = 'Cập nhật thành công 🎉';
    
                header('Location: ' . url("admin/categories/{$category['id']}/edit"));
                exit;
            }
    }

    public function delete($id) {
        try {
            $this->category->delete($id);
            $_SESSION['alert'] = true;
            $_SESSION['msg'] = 'Thao tác thành công 🎉';
        } catch (\Throwable $th) {
            $_SESSION['alert'] = false;
            $_SESSION['msg'] = 'Thao tác KHÔNG thành công!';
        }
        header('Location: ' . url('admin/categories'));
        exit();
    }
}