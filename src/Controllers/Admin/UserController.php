<?php 

namespace MyNamespace\MyProject\Controllers\Admin;

use MyNamespace\MyProject\Common\Controller;
use MyNamespace\MyProject\Models\User;
use Rakit\Validation\Validator;

class UserController extends Controller
{
    private User $user;
    public function __construct() {
        $this->user = new User();
    }

    public function index() {
        $page = $_GET["page"] ?? 1;
        [$list, $totalPage] = $this->user->paginate($page);
        $this->renderViewAdmin('users.index', [
            'list' => $list,
            'totalPages' => $totalPage,
            'currentPage' => $page,
        ]);
    }

    public function show($id) {
        $user = $this->user->findByID($id);
        $this->renderViewAdmin('users.show', [
            'user' => $user
        ]);
    }

    public function create() {
        $this->renderViewAdmin('users.create');
    }

    public function store() {
        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'name'          => 'required|max:50',
            'email'         => 'required|email',
            'password'      => 'required|min:6',
            'confirm'       => 'required|same:password',
            'avatar'        => 'uploaded_file:0,2M,png,jpg,jpeg',
            'role'          => 'required|in:admin,member',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url('admin/users/create'));
            exit;
        } else {
            $data = [
                'name'     => $_POST['name'],
                'email'    => $_POST['email'],
                'role'     => $_POST['role'],
                'password'  => password_hash($_POST['password'], PASSWORD_DEFAULT),
            ];

            if (isset($_FILES['avatar']) && $_FILES['avatar']['size'] > 0) {

                $from = $_FILES['avatar']['tmp_name'];
                $to = 'assets/uploads/' . time() . $_FILES['avatar']['name'];

                if (move_uploaded_file($from, PATH_ROOT . $to)) {
                    $data['avatar'] = $to;
                } else {
                    $_SESSION['errors']['avatar'] = 'Upload Failed 😕';

                    header('Location: ' . url('admin/users/create'));
                    exit;
                }
            }

            $this->user->insert($data);

            $_SESSION['alert-success'] = true;
            $_SESSION['msg'] = 'Created successfully 😊';

            header('Location: ' . url('admin/users'));
            exit;
        }
    }

    public function edit($id) {
        $user = $this->user->findByID($id);
        $this->renderViewAdmin('users.edit', [
            'user' => $user
        ]);
    }

    public function update($id) {
            $user = $this->user->findByID($id);
    
            $validator = new Validator;
            $validation = $validator->make($_POST + $_FILES, [
                'name'                  => 'required|max:50',
                'email'                 => 'required|email',
                'avatar'                => 'uploaded_file:0,2M,png,jpg,jpeg',
                'role'                  => 'required|in:admin,member',
            ]);
            $validation->validate();
    
            if ($validation->fails()) {
                $_SESSION['errors'] = $validation->errors()->firstOfAll();
    
                header('Location: ' . url("admin/users/{$user['id']}/edit"));
                exit;
            } else {
                $data = [
                    'name'      => $_POST['name'],
                    'email'     => $_POST['email'],
                    'role'      => $_POST['role'],
                ];
    
                $flagUpload = false;
                if (isset($_FILES['avatar']) && $_FILES['avatar']['size'] > 0) {
    
                    $flagUpload = true;
    
                    $from = $_FILES['avatar']['tmp_name'];
                    $to = 'assets/uploads/' . time() . $_FILES['avatar']['name'];
    
                    if (move_uploaded_file($from, PATH_ROOT . $to)) {
                        $data['avatar'] = $to;
                    } else {
                        $_SESSION['errors']['avatar'] = 'Update Failed 😕';
    
                        header('Location: ' . url("admin/users/{$user['id']}/edit"));
                        exit;
                    }
                }
    
                $this->user->update($id, $data);
    
                if (
                    $flagUpload
                    && $user['avatar']
                    && file_exists(PATH_ROOT . $user['avatar'])
                ) {
                    unlink(PATH_ROOT . $user['avatar']);
                }
    
                $_SESSION['alert-success'] = true;
                $_SESSION['msg'] = 'Updated Successfully 😊';
    
                header('Location: ' . url("admin/users/{$user['id']}/edit"));
                exit;
            }
    }

    public function delete($id) {
        try {
            $this->user->delete($id);
            $_SESSION['alert-success'] = true;
            $_SESSION['msg'] = 'Action Completed Successfully! 🤑';
        } catch (\Throwable $th) {
            $_SESSION['alert-error'] = true;
            $_SESSION['msg'] = 'Action Failed! 🤦‍♂️😞';
        }
        header('Location: ' . url('admin/users'));
        exit();
    }
}