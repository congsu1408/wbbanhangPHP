<?php
$obj = new product();
?>
<?php
$conn = mysqli_connect("localhost", "root", "", "websitebanhang");
// Phân tách URL thành các thành phần
$url_components = explode('/', $_SERVER['REQUEST_URI']);

// Lấy giá trị IP
$ma_sp = $url_components[4];

// Sử dụng giá trị của trường `ma_loaisp` để truy vấn cơ sở dữ liệu và lấy thông tin chi tiết của sản phẩm
$sql = "SELECT * FROM product WHERE ma_sp = '$ma_sp'";
$result = mysqli_query($conn, $sql);
$value = mysqli_fetch_assoc($result);

// Đóng kết nối đến cơ sở dữ liệu
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sửa thông tin sản phẩm</title>
    <link rel="stylesheet" href="../../public/CSS/edit_order.css">

</head>
<body>
<form action="" method="post">
    <input type="hidden" name="ma_sp" value="<?php echo $value['ma_sp'] ?>">
    <h1>Sửa thông tin sản phẩm</h1>
    <table border="1">
        <tr>
            <td>Mã loại sản phẩm</td>
            <td>
                <input type="text" name="ma_loaisp" value="<?php echo $value['ma_loaisp'] ?>">
            </td>
        </tr>
        <tr>
            <td>Tên sản phẩm</td>
            <td><input type="text" name="tensp" value="<?php echo $value['tensp'] ?>"></td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td><input type="text" name="hinhanh" value="<?php echo $value['hinhanh'] ?>"></td>
        </tr>
        <tr>
            <td>Đơn giá</td>
            <td><input type="text" name="dongia" value="<?php echo $value['dongia'] ?>"></td>
        </tr>
        <tr>
            <td>Số lượng</td>
            <td><input type="text" name="soluong" value="<?php echo $value['soluong'] ?>"></td>
        </tr>
        <tr>
            <td>Khuyến mãi</td>
            <td><input type="text" name="khuyenmai" value="<?php echo $value['khuyenmai'] ?>"></td>
        </tr>
        <tr>
            <td>Ngày tạo</td>
            <td><input type="text" name="create_date" value="<?php echo $value['create_date'] ?>"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Sửa" name="btnsave"></td>
        </tr>
    </table>
</form>
</body>
</html>
<?php
// Lấy giá trị của các trường trong biểu mẫu HTML
$ma_loaisp = isset($_POST['ma_loaisp']) ? $_POST['ma_loaisp'] : "";
$ma_sp = isset($_POST['ma_sp']) ? $_POST['ma_sp'] : "";
$tensp = isset($_POST['tensp']) ? $_POST['tensp'] : "";
$hinhanh = isset($_POST['hinhanh']) ? $_POST['hinhanh'] : "";
$dongia = isset($_POST['dongia']) ? $_POST['dongia'] : "";
$soluong = isset($_POST['soluong']) ? $_POST['soluong'] : "";
$khuyenmai = isset($_POST['khuyenmai']) ? $_POST['khuyenmai'] : "";
$create_date = isset($_POST['create_date']) ? $_POST['create_date'] : "";
$giakm = intval($dongia) - (intval($dongia) * intval($khuyenmai) / 100);

if (isset($_POST['btnsave'])) {
    // cập nhật thông tin sản phẩm
    $obj->editProduct($ma_loaisp, $ma_sp, $tensp, $hinhanh, $dongia, $soluong, $khuyenmai, $giakm, $create_date);

    // Chuyển hướng người dùng đến trang danh sách đơn hàng
//    header("Location: http://localhost/PHP/order/showOrderStatus/");
}
?>

