<?php
$obj = new home();
?>
<link rel="stylesheet" href="../../public/CSS/header.css">
<link rel="stylesheet" href="../../public/CSS/adprotype.css">
<?php
$conn = mysqli_connect("localhost", "root", "", "websitebanhang");
// Sửa đoạn mã PHP để nhận giá trị của trường `ma_sp` từ dữ liệu được gửi lên bởi biểu mẫu HTML
$txt_maloaisp =isset($_POST['txt_maloaisp'])? $_POST['txt_maloaisp']:"";
$txt_tenloaisp =isset($_POST['txt_tenloaisp'])? $_POST['txt_tenloaisp']:"";
$txt_motaloaisp =isset($_POST['txt_motaloaisp'])? $_POST['txt_motaloaisp']:"";
// Sửa đoạn mã PHP để nhận giá trị của trường `ma_loaisp` từ giá trị cuối cùng trong đường dẫn URL
// Phân tách URL thành các thành phần
$url_components = explode('/', $_SERVER['REQUEST_URI']);

// Lấy giá trị IP
$ma_sp = $url_components[4];

// Sử dụng giá trị của trường `ma_loaisp` để truy vấn cơ sở dữ liệu và lấy thông tin chi tiết của sản phẩm
$sql = "SELECT * FROM product WHERE ma_sp = '$ma_sp'";
$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($result);

// in ra màn hình giá trị của biến $product
//var_dump($product);

// Hiển thị thông tin chi tiết của sản phẩm trên trang web
//echo "<h2>{$product['tensp']}</h2>";
//echo "<img src='public/images/{$product['hinhanh']}' width='200' alt='{$product['tensp']}'>";
//echo  "<p>Số Lượng: {$product['soluong']}</p>";
//echo "<p>Giá Khuyến Mãi: {$product['dongia']}</p>";

// Đóng kết nối đến cơ sở dữ liệu
mysqli_close($conn);
?>
<div class="card">
    <div class="card-body">
        <table class="product-info">
            <tr>
                <td style="font-family: sans-serif; font-weight: bold;font-size: 30px; text-align: center"><?php echo $product['tensp'] ?></td>
            </tr>
            <tr>
                <td style="text-align: center">
                    <img src="../../public/images/<?php echo $product['hinhanh'] ?>" width="220" alt="<?php echo $product['tensp']?>">
                </td>
    </tr>
            <?php if ($product['khuyenmai'] != 0): ?>
                <tr class="card-title">
                    <th class="block-1">Giá Gốc:  </th>
                    <th class="block-2" style="text-decoration: line-through 2px" > <?php echo $product['dongia'] ?> </th>
                </tr>
                <tr class="card-title">
                    <th class="block-1">Khuyến Mãi: </th>
                    <th class="block-2"><?php echo $product['khuyenmai'] ?>%</th>
                </tr>
                <tr class="card-title">
                    <th class="block-1">Giá KM:  </th>
                    <th class="block-2" "> <?php echo $product['giakm'] ?> </th>
                </tr>
            <?php else: ?>
                <tr class="card-title">
                    <th class="block-1">Giá Bán:  </th>
                    <th class="block-2"> <?php echo $product['dongia'] ?> </th>
                </tr>
            <?php endif; ?>
            <tr class="card-title">
                <th class="block-1">Ngày nhập hàng: </th>
                <th class="block-2"> <?php echo $product['create_date'] ?></th>
            </tr>
    <tr>
            <td> <a href="http://localhost/PHP/order/addtocart/<?php echo $product['ma_sp'] ?>" class="btn-add">Add to card </a></td>
    </tr>
    <tr>
        <td colspan="2">
            <a href="javascript:history.back()" class="back">BACK</a>
        </td>
    </tr>

</table>
    </div>
</div>
