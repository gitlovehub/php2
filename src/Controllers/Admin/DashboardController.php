<?php 

namespace MyNamespace\MyProject\Controllers\Admin;

use MyNamespace\MyProject\Common\Controller;
use MyNamespace\MyProject\Common\Helper;
use MyNamespace\MyProject\Models\User;
use MyNamespace\MyProject\Models\Order;
use MyNamespace\MyProject\Models\Product;
use MyNamespace\MyProject\Models\Category;

class DashboardController extends Controller
{
    private User $user;
    private Order $order;
    private Product $product;
    private Category $category;

    public function __construct() {
        $this->user = new User();
        $this->order = new Order();
        $this->product = new Product();
        $this->category = new Category();
    }

    public function dashboard() {
        $currentDate  = getdate();
        $currentYear  = $currentDate['year'];
        $currentMonth = $currentDate['mon'];
        
        $totalUsers        = $this->user->count();
        $totalOrders       = $this->order->count();
        $totalProducts     = $this->product->count();
        $totalCategories   = $this->category->count();
        $availableProducts = $this->product->countAvailableProducts();
        $monthlyUsers      = $this->calcEachMonth($currentYear, $currentMonth);

        $orders = $this->order->getOrders();
        
        $this->renderViewAdmin('dashboard', [
            'orders'             => $orders,
            'totalUsers'         => $totalUsers,
            'totalOrders'        => $totalOrders,
            'monthlyUsers'       => $monthlyUsers,
            'totalProducts'      => $totalProducts,
            'totalCategories'    => $totalCategories,
            'availableProducts'  => $availableProducts,
        ]);
    }

    public function calcEachMonth($year, $month) {
        // Lấy số lượng người dùng trong tháng hiện tại
        $currentMonthUsers = $this->user->countUserByMonth($year, $month);
        // Lấy số lượng người dùng trong tháng trước đó
        $previousMonthUsers = $this->user->countUserByMonth($year, $month - 1);
        // Tính sự gia tăng so với tháng trước
        $qty = $currentMonthUsers - $previousMonthUsers;
            // Kiểm tra nếu increase nhỏ hơn 0, thì thay đổi thành decrease
        return $qty;
    }

}