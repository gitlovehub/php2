<?php 

namespace MyNamespace\MyProject\Controllers\Admin;

use MyNamespace\MyProject\Common\Controller;
use MyNamespace\MyProject\Models\User;

class UserController extends Controller
{
    private User $user;
    public function __construct() {
        $this->user = new User();
    }

    public function index() {
        $list = $this->user->read();
        $this->renderViewAdmin('users.index', [
            'list' => $list
        ]);
    }

    public function show($id) {
        $user = $this->user->findByID($id);
        $this->renderViewAdmin('users.show', [
            'user' => $user
        ]);
    }

    public function edit($id) {
        echo __CLASS__ . '@' . __FUNCTION__ . ' - ID = ' . $id;
    }

    public function update($id) {
        echo __CLASS__ . '@' . __FUNCTION__ . ' - ID = ' . $id;
    }

    public function delete($id) {
        try {
            $this->user->delete($id);
            $_SESSION['alert'] = true;
            $_SESSION['msg'] = 'Thao tác thành công!';
        } catch (\Throwable $th) {
            $_SESSION['alert'] = false;
            $_SESSION['msg'] = 'Thao tác KHÔNG thành công!';
        }
        header('Location: ' . url('admin/users'));
        exit();
    }
}