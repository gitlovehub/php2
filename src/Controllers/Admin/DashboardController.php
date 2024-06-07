<?php 

namespace MyNamespace\MyProject\Controllers\Admin;

use MyNamespace\MyProject\Common\Controller;

class DashboardController extends Controller
{
    public function dashboard() {
        $this->renderViewAdmin(__FUNCTION__);
    }
}