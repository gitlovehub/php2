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
        $page = $_GET["page"] ?? 1;
        [$list, $totalPage] = $this->category->paginate($page);
        $this->renderViewAdmin('categories.index', [
            'list' => $list,
            'totalPages' => $totalPage,
            'currentPage' => $page,
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

            $_SESSION['alert-success'] = true;
            $_SESSION['msg'] = 'Created Successfully 😊';

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
    
                $_SESSION['alert-success'] = true;
                $_SESSION['msg'] = 'Updated Successfully 😊';
    
                header('Location: ' . url("admin/categories/{$category['id']}/edit"));
                exit;
            }
    }

    public function delete($id) {
        try {
            $this->category->delete($id);
            $_SESSION['alert-success'] = true;
            $_SESSION['msg'] = 'Action Completed Successfully! 🤑';
        } catch (\Throwable $th) {
            $_SESSION['alert-error'] = true;
            $_SESSION['msg'] = 'Action Failed! 🤦‍♂️😞';
        }
        header('Location: ' . url('admin/categories'));
        exit();
    }
}