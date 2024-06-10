<?php 

namespace MyNamespace\MyProject\Controllers\Client;
use MyNamespace\MyProject\Common\Controller;
use MyNamespace\MyProject\Common\Helper;
use MyNamespace\MyProject\Models\Cart;
use MyNamespace\MyProject\Models\Product;
use MyNamespace\MyProject\Models\CartDetail;

class CartController extends Controller
{
    private Cart $cart;
    private Product $product;
    private CartDetail $cartDetail;
    public function __construct() {
        $this->cart = new Cart();
        $this->product = new Product();
        $this->cartDetail = new CartDetail();
    }

    public function cart() {
        // Kiểm tra người dùng đã đăng nhập chưa
        if (isset($_SESSION['user'])) {
            $cart = $this->cartDetail->getCartByCustomer($_SESSION['user']['id']);

            $this->renderViewClient('cart', [
                'carts'  => $cart,
            ]);
        } else {
            $this->renderViewClient('cart');
        }
    }

    public function add() {
        // Lấy thông tin sản phẩm theo ID
        $product = $this->product->findByID($_GET['productID']);

        // Tên biến session cho giỏ hàng
        $cartKey = 'cart';

        // Kiểm tra người dùng đã đăng nhập chưa
        if (isset($_SESSION['user'])) {
            // Nếu đã đăng nhập, thêm ID người dùng vào tên biến session
            $cartKey .= '-' . $_SESSION['user']['id'];
        }

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        if (!isset($_SESSION[$cartKey][$product['id']])) {
            // Nếu chưa, thêm sản phẩm vào giỏ hàng
            $_SESSION[$cartKey][$product['id']] = $product + ['quantity' => $_GET['qty'] ?? 1];
        } else {
            // Nếu sản phẩm đã tồn tại, cập nhật số lượng
            $_SESSION[$cartKey][$product['id']]['quantity'] += $_GET['qty'];
        }

        // Kiểm tra nếu người dùng đã đăng nhập
        if (isset($_SESSION['user'])) {
            // Kết nối đến cơ sở dữ liệu
            $conn = $this->cart->getConnection();

            // Bắt đầu giao dịch để đảm bảo tính nhất quán
            // $conn->beginTransaction();
            try {
                // Tìm giỏ hàng của người dùng
                $cart = $this->cart->findByUserID($_SESSION['user']['id']);

                // Nếu không có giỏ hàng, thêm một bản ghi mới vào cơ sở dữ liệu
                if (empty($cart)) {
                    $this->cart->insert([
                        'user_id' => $_SESSION['user']['id'],
                    ]);
                }

                // Lấy ID của giỏ hàng, sử dụng lastInsertId() nếu không tìm thấy
                $cartID = $cart['id'] ?? $conn->lastInsertId();

                // Lưu cartID vào session để sử dụng xóa item trong Cart
                $_SESSION['cart_id'] = $cartID;

                // Xóa các mục hiện có trong giỏ hàng để cập nhật lại
                $this->cartDetail->deleteByCartID($cartID);

                // Lặp qua các mục trong giỏ hàng và thêm chúng vào cơ sở dữ liệu
                foreach ($_SESSION[$cartKey] as $productID => $item) {
                    $this->cartDetail->insert([
                        'cart_id'    => $cartID,
                        'product_id' => $productID,
                        'quantity'   => $item['quantity'],
                        'price'      => $item['price']
                    ]);
                }
                // Chấp nhận các thay đổi và kết thúc giao dịch
                // $conn->commit();
            } catch (\Throwable $th) {
                // Nếu có lỗi, rollback các thay đổi và xử lý ngoại lệ
                // $conn->rollBack();
            }
        }

        header('Location: ' . url('cart'));
        exit;
    }

    public function delete() {
        // Xác định key cho giỏ hàng
        $cartKey = 'cart';
        if (isset($_SESSION['user'])) {
            // Nếu đã đăng nhập, thêm ID người dùng vào tên biến session
            $cartKey .= '-' . $_SESSION['user']['id'];
            // thực hiện xóa
            $this->cartDetail->deleteByCartIDAndProductID($_GET['cartID'], $_GET['productID']);
        } else {
            // Chưa đăng nhập, kiểm tra sự tồn tại của productID trước khi xóa
            if (isset($_GET['productID'])) {
                unset($_SESSION[$cartKey][$_GET['productID']]);
            }
        }

        header('Location: ' . url('cart'));
        exit;
    }
}