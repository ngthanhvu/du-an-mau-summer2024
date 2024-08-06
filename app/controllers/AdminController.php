<?php
class AdminController
{
    public function register()
    {
        $data = [
            'username' => $_POST['username'] ?? '',
            'email' => $_POST['email'] ?? '',
            'phone' => $_POST['phone'] ?? '',
            'password' => $_POST['password'] ?? '',
            'confirm_password' => $_POST['confirm_password'] ?? '',
        ];

        include_once __DIR__ . '/../../app/models/Register.php';
        $loginRegister = new LoginRegister();
        $result = $loginRegister->register($data);

        if ($result['success']) {
            header('Location: /login');
        } else {
            $errors = $result['errors'];
            include __DIR__ . '/../../app/views/home/register.php';
        }
    }


    public function sendOtp($email)
    {
        $data = [
            'email' => $email ?? '',
        ];

        include_once __DIR__ . '/../../app/models/User.php';
        $user = new User();
        $result = $user->sendOtp($data);

        if ($result['success']) {
            $_SESSION['email'] = $data['email'];
            header('Location: /very-otp');
        } else {
            $errors = $result['errors'];
            include __DIR__ . '/../../app/views/home/forgotpassword.php';
        }
    }

    public function login()
    {
        $data = [
            'username' => $_POST['username'] ?? '',
            'password' => $_POST['password'] ?? '',
        ];

        include_once __DIR__ . '/../../app/models/Register.php';
        $loginRegister = new LoginRegister();
        $result = $loginRegister->login($data);

        if ($result['success']) {
            $_SESSION['user'] = $result['user'];
            header('Location: /');
        } else {
            $errors = $result['errors'];
            include __DIR__ . '/../../app/views/home/login.php';
        }
    }

    #user
    public function getUser()
    {
        include_once __DIR__ . '/../../app/models/User.php';
        $user = new User();
        $users = $user->getUser();
        $url = $_SERVER['REQUEST_URI'];
        if ($url == '/admin/User') {
            include_once __DIR__ . '/../../app/views/admin/adminUser.php';
        } elseif ($url == '/test') {
            include_once __DIR__ . '/../../app/views/home/test.php';
        }
    }

    public function getUserId($id)
    {
        include_once __DIR__ . '/../../app/models/User.php';
        $user = new User();
        $users = $user->getUserId($id);
        $url = $_SERVER['REQUEST_URI'];
        if ($url == '/checkout?id=' . $id) {
            include_once __DIR__ . '/../../app/views/home/checkout.php';
        }
    }

    public function deleteUser($id)
    {
        include_once __DIR__ . '/../../app/models/User.php';
        $user = new User();
        $user->deleteUser($id);
        header('Location: /admin/User');
    }

    #product
    public function getProduct()
    {
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $recordsPerPage = 8; //chỉnh sửa số lượng nội dung hiển thị trên 1 trang

        include_once __DIR__ . '/../../app/models/Product.php';
        $product = new Product();
        $totalProducts = $product->getTotalProducts();
        $totalPages = ceil($totalProducts / $recordsPerPage);

        $offset = ($currentPage - 1) * $recordsPerPage;

        $products = $product->getProduct($offset, $recordsPerPage);

        include_once __DIR__ . '/../../app/views/admin/adminProduct.php';
    }

    public function getCategory()
    {
        include_once __DIR__ . '/../../app/models/Category.php';
        $category = new Category();
        $categories = $category->getCategory();
        include_once __DIR__ . '/../../app/views/admin/adminCategory.php';
    }

    public function getProductId($id)
    {
        include_once __DIR__ . '/../../app/models/Product.php';
        $product = new Product();
        $products = $product->getProductId($id);
        include_once __DIR__ . '/../../app/views/admin/update/updateProduct.php';
    }

    public function recommendProduct($id)
    {
        include_once __DIR__ . '/../../app/models/Product.php';
        $product = new Product();
        $recommendProduct = $product->recommendProduct($id);
        include_once __DIR__ . '/../../app/views/home/detail.php';
    }

    public function addProducts()
    {
        $data = [
            'product_name' => $_POST['product_name'] ?? '',
            'price' => $_POST['price'] ?? '',
            'quantity' => $_POST['quantity'] ?? '',
            'description' => $_POST['description'] ?? '',
            'image' => $_POST['image'] ?? '',
            'category_id' => $_POST['category_id'] ?? '',
            'size' => $_POST['size'] ?? '',
        ];
        include_once __DIR__ . '/../../app/models/Product.php';
        $product = new Product();
        $result = $product->addProduct($data);

        if ($result['success']) {
            header('Location: /admin/product');
        } else {
            $errors = $result['errors'];
            include __DIR__ . '/../../app/views/admin/add/addProduct.php';
        }
    }

    public function deleteProduct($id)
    {
        include_once __DIR__ . '/../../app/models/Product.php';
        $product = new Product();
        $product->deleteProduct($id);
        header('Location: /admin/product');
    }

    public function updateProduct($id, $data)
    {
        include_once __DIR__ . '/../../app/models/Product.php';
        $product = new Product();
        $product->updateProduct($id, $data);
        header('Location: /admin/product');
    }

    public function updateProfile($id, $data)
    {
        include_once __DIR__ . '/../../app/models/User.php';
        $user = new User();
        $user->updateProfile($id, $data);
        header('Location: /profile?id=' . $id);
    }

    public function addCategory()
    {
        $data = [
            'name' => $_POST['name'] ?? '',
            'image' => $_POST['image'] ?? '',
        ];
        include_once __DIR__ . '/../../app/models/Category.php';
        $category = new Category();
        $result = $category->addCategory($data);
        if ($result['success']) {
            header('Location: /admin/category');
        } else {
            $errors = $result['errors'];
            include __DIR__ . '/../../app/views/admin/add/addCategory.php';
        }
    }

    public function addCart()
    {
        if (empty($_SESSION['user']['id'])) {
            header('Location: /login');
        }
        $data = [
            'user_id' => $_SESSION['user']['id'] ?? '',
            'product_id' => $_POST['product_id'] ?? '',
            'quantity' => $_POST['quantity'] ?? '',
            'name' => $_POST['name'] ?? '',
            'image' => $_POST['image'] ?? '',
            'price' => $_POST['price'] ?? '',
            'size' => $_POST['size'] ?? '',
        ];
        include_once __DIR__ . '/../../app/models/Cart.php';
        $cart = new Cart();
        $result = $cart->addCart($data);
        if ($result['success']) {
            header('Location: /cart');
        } else {
            $errors = $result['errors'];
            echo 'Lỗi: ' . $errors;
        }
    }


    public function deleteCart($id)
    {
        include_once __DIR__ . '/../../app/models/Cart.php';
        $cart = new Cart();
        $cart->deleteCart($id);
        header('Location: /cart');
    }

    public function addOrder()
    {
        $errors = [];
        $data = [
            'carts' => $_POST['carts'] ?? [],
            'user_id' => $_SESSION['user']['id'] ?? '',
            'total' => $_POST['total'] ?? '',
            'status' => $_POST['status'] ?? '1', // Đặt mặc định là chưa thanh toán (1)
            'name' => $_POST['name'] ?? '',
            'address' => $_POST['address'] ?? '',
            'phone' => $_POST['phone'] ?? '',
            'size' => $_POST['size'] ?? '',
        ];

        include_once __DIR__ . '/../../app/models/Order.php';
        $order = new Order();
        $result = $order->addOrder($data);

        if ($result['success']) {
            $_SESSION['order_id'] = $result['order_id'];

            header("Location: /checkout?id=" . $_SESSION['user']['id']);
            exit;
        } else {
            $errors = $result['errors'];
            echo 'Lỗi: ' . $errors;
        }
    }


    public function order_detail($id)
    {
        include_once __DIR__ . '/../../app/models/Order.php';
        $order = new Order();
        $order_details = $order->order_detail($id);
        include __DIR__ . '/../../app/views/home/checkout.php';
    }

    public function getOrder()
    {
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $recordsPerPage = 8; //chỉnh sửa số lượng nội dung hiển thị trên 1 trang

        include_once __DIR__ . '/../../app/models/Order.php';
        $order = new Order();
        $totalOrders = $order->getTotalOrders();
        $totalPages = ceil($totalOrders / $recordsPerPage);

        $offset = ($currentPage - 1) * $recordsPerPage;

        $orders = $order->getOrder($offset, $recordsPerPage);

        include __DIR__ . '/../../app/views/admin/adminOrder.php';
    }

    public function getBill()
    {
        include_once __DIR__ . '/../../app/models/Bill.php';
        $bill = new Bill();
        $bills = $bill->getBill();
        include __DIR__ . '/../../app/views/admin/adminBill.php';
    }

    public function deleteOrder($id)
    {
        include_once __DIR__ . '/../../app/models/Order.php';
        $order = new Order();
        $result = $order->deleteOrder($id);
        if ($result['success']) {
            header('Location: /admin/order');
        } else {
            $errors = $result['errors'];
            echo 'Lỗi: ' . $errors;
        }
    }

    public function payment()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_GET['id'];
            $fullName = $_POST['full_name'];
            $address = $_POST['address'];
            $productName = $_POST['product_name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $user_id = $_POST['user_id'];
            $paymentMethod = $_POST['payment'];
            $total = $_POST['total'];
            $size = $_POST['size'];

            include_once __DIR__ . '/../../app/models/Order.php';
            $order = new Order();

            // Tạo đơn hàng mới
            $orderData = [
                'carts' => $_SESSION['cart'],
                'user_id' => $user_id,
                'total' => $total,
                'status' => 1, // Chưa thanh toán
                'name' => $fullName,
                'address' => $address,
                'phone' => $phone,
                'size' => $size
            ];
            $result = $order->addOrder($orderData);

            if (!$result['success']) {
                die("Lỗi khi tạo đơn hàng.");
            }

            $orderId = $result['order_id'];

            include_once __DIR__ . '/../../app/models/Payment.php';
            $payment = new Payment();

            if ($paymentMethod === 'cod') {
                $status = '1'; // Chưa thanh toán
                $payment->updateOrderStatus($orderId, $status);
                $payment->createBill($fullName, $email, $phone, $address, $orderId, $productName, $size, $total, $status, $user_id);

                // Cập nhật số lượng sản phẩm sau khi thanh toán thành công
                foreach ($_SESSION['cart'] as $cartItem) {
                    $order->updateProductQuantity($cartItem['product_id'], $cartItem['quantity']);
                }

                include_once __DIR__ . '/../../app/models/Cart.php';
                $cart = new Cart();
                $cart->deleteCartUserId($user_id);

                // Gửi email xác nhận
                include_once __DIR__ . '/../../app/models/Mail.php';
                $mail = new Mail();
                $orderDetails = $order->getOrderDetailsByOrderId($orderId);

                $emailResult = $mail->sendOrderConfirmation(
                    $email,
                    $fullName,
                    $orderDetails
                );

                if (!$emailResult['success']) {
                    echo 'Lỗi khi gửi email: ' . $emailResult['error'];
                }

                header("Location: /order?id=" . $user_id);
                exit;
            } elseif ($paymentMethod === 'vnpay') {
                // Xử lý thanh toán với VNPAY
                $_SESSION['size_order'] = $size;
                $this->processVnPayPayment($orderId, $total);
            }
        }
    }

    private function processVnPayPayment($orderId, $total)
    {

        function convertToDateTime($dateString)
        {
            $dateTime = DateTime::createFromFormat('YmdHis', $dateString, new DateTimeZone('Asia/Bangkok')); // GMT+7

            if ($dateTime === false) {
                return "Invalid date format.";
            } else {
                return $dateTime;
            }
        }
        $vnp_TmnCode = VNPAY_TMN_CODE;
        $vnp_HashSecret = VNPAY_HASH_SECRET;
        $vnp_Url = VNPAY_URL;
        $vnp_Returnurl = VNPAY_RETURN_URL;

        $vnp_TxnRef = $orderId;
        $vnp_OrderInfo = 'Thanh toan don hang ' . $orderId;
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $total * 100; // Đơn vị là VND
        $vnp_Locale = 'vn';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $date = new DateTime("now", new DateTimeZone('Asia/Bangkok'));
        $vnp_CreateDate = $date->format('YmdHis');

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => $vnp_CreateDate,
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        header('Location: ' . $vnp_Url);
        exit();
    }

    public function userBill($id)
    {
        include_once __DIR__ . '/../../app/models/Bill.php';
        $bill = new Bill();
        $bills = $bill->userBill($id);
        include __DIR__ . '/../../app/views/home/order.php';
    }

    public function addComment()
    {
        if (empty($_SESSION['user']['id'])) {
            header('Location: /login');
        }
        include_once __DIR__ . '/../../app/models/Comment.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product_id = $_POST['product_id'];
            $user_id = $_POST['user_id'];
            $username = trim($_POST['username']);
            $comment = trim($_POST['comment']);

            if (!empty($username) && !empty($comment)) {
                $commentModel = new Comment();
                $commentModel->addComment($product_id, $user_id, $username, $comment);
            }

            header("Location: /detail?id=$product_id");
            exit();
        }
    }

    public function getCommentsByProductId($id)
    {
        include_once __DIR__ . '/../../app/models/Comment.php';
        $comment = new Comment();
        $comments = $comment->getCommentsByProductId($id);
        include __DIR__ . '/../../app/views/home/detail.php';
    }

    public function deleteComment($id, $product_id)
    {
        include_once __DIR__ . '/../../app/models/Comment.php';
        $comment = new Comment();
        $comment->deleteComment($id);
        header("Location: /detail?id=$product_id");
    }

    public function deleteBill($id)
    {
        include_once __DIR__ . '/../../app/models/Bill.php';
        $bill = new Bill();
        $bill->deleteBill($id);
        header("Location: /admin/bill");
    }

    public function deleteCategory($id)
    {
        include_once __DIR__ . '/../../app/models/Category.php';
        $category = new Category();
        $category->deleteCategory($id);
        header("Location: /admin/category");
    }
    public function googleLogin()
    {
        include_once __DIR__ . '/../../app/models/google.php';
        $google = new Google();
        $google->googleLogin();
    }

    public function googleCallback()
    {
        include_once __DIR__ . '/../../app/models/google.php';
        $google = new Google();
        $google->googleCallback();
    }

    public function checkOtp()
    {
        $data = [
            'otp' => $_POST['otp'] ?? null,
            'email' => $_POST['email'] ?? null,
        ];
        include_once __DIR__ . '/../../app/models/User.php';
        $user = new User();
        $result = $user->checkOtp($data);

        if ($result['success']) {
            header('Location: /update-password?id=' . $result['user_id']);
            exit();
        } else {
            echo $result['message'];
        }
    }

    public function updateNewPassword()
    {
        $data = [
            'password' => $_POST['password'] ?? null,
            'id' => $_POST['id'] ?? null,
            'confirm_password' => $_POST['confirm_password'] ?? null
        ];
        include_once __DIR__ . '/../../app/models/User.php';
        $user = new User();
        $result = $user->updatePassword($data);

        if ($result['success']) {
            header('Location: /login');
            exit();
        } else {
            echo $result['message'];
        }
    }

    public function addCoupon()
    {
        $data = [
            'code' => $_POST['code'] ?? '',
            'discount_amount' => $_POST['discount_amount'] ?? '',
            'max_uses' => $_POST['max_use'] ?? '',
            'end_date' => $_POST['end_date'] ?? ''
        ];
        include_once __DIR__ . '/../../app/models/Coupon.php';
        $coupon = new Coupon();
        $result = $coupon->addCoupon($data);

        if ($result['success']) {
            header('Location: /admin/coupon');
            exit();
        } else {
            $errors = $result['errors'];
            include __DIR__ . '/../../app/views/admin/add/addCoupon.php';
        }
    }

    public function getCoupon()
    {
        $errors = [];
        $data = [
            'code' => $_POST['code'] ?? '',
        ];
        include_once __DIR__ . '/../../app/models/Coupon.php';
        $coupon = new Coupon();
        $result = $coupon->activeCoupon($data);

        if ($result['success']) {
            header('Location: /cart');
            exit();
        } else {
            echo $result['message'];
            include __DIR__ . '/../../app/views/home/cart.php';
        }
    }

    public function deleteCoupon($id)
    {
        include_once __DIR__ . '/../../app/models/Coupon.php';
        $coupon = new Coupon();
        $coupon->deleteCoupon($id);
        header("Location: /admin/coupon");
    }
}
