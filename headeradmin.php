<!DOCTYPE html>
<html>
<head>
    <title>Trang web của bạn</title>
    <style>
        .top-nav-bar {
            background-color: #4CAF50;
            padding: 10px 0;
            display: flex;
            justify-content: space between;
        }

        .top-nav-bar a {
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 4px;
        }

        .top-nav-bar a:hover {
            background-color: #3e8f3e;
        }

        .top-nav-bar .logo {
            font-size: 20px;
            font-weight: bold;
        }

        button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 15px;
            margin: 2px 2px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<header>
    <nav class="top-nav-bar">
        <a href="http://localhost/PHP/admin/show">Dashboard</a>
        <a href="http://localhost/PHP/customer/showCustomer/">Quản lý khách hàng</a>
        <a href="http://localhost/PHP/order/showOrderStatus/">Quản lý đơn hàng</a>
        <a href="http://localhost/PHP/product/manageProduct/">Quản lý sản phẩm</a>

        <!-- Nút đăng xuất -->
        <a href="logout.php">
            Logout
        </a>
    </nav>
</header>
</body>
</html>
