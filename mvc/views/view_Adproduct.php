<link rel="stylesheet" href="../../public/CSS/adproduct.css">
<link rel="stylesheet" href="../../public/CSS/header.css">
<?php
require_once "header.php";
$obj= new product;
$obj->show();
$ma_loaisp = isset($_POST["dropdow"])?$_POST["dropdow"]:"";
$txt_masp = isset($_POST["txt_masp"])?$_POST["txt_masp"]:"";
$txt_tensp = isset($_POST["txt_tensp"])?$_POST["txt_tensp"]:"";
$txt_hinhanh = isset($_FILES['fileUpload']) ? $_FILES['fileUpload']['name']:"";
$txt_dongia = isset($_POST["txt_dongia"])?$_POST["txt_dongia"]:"";
$txt_soluong = isset($_POST["txt_soluong"])?$_POST["txt_soluong"]:"";
$txt_khuyenmai = isset($_POST["txt_khuyenmai"])?$_POST["txt_khuyenmai"]:"";
$create_date =date("d/m/y");
// Calculate the discounted price
$giakm = intval($txt_dongia) - (intval($txt_dongia) * intval($txt_khuyenmai) / 100);


if (isset($_POST["btn_save"])){
    $obj->insert($ma_loaisp,$txt_masp,$txt_tensp,$txt_hinhanh,$txt_dongia,$txt_soluong,$txt_khuyenmai,$giakm,$create_date);
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Mã loại sản phẩm</td>
            <td>
                <input type="text" name="dropdow" id="">
            </td>
        </tr>
        <tr>
            <td>Mã sản phẩm</td>
            <td>
                <input type="text" name="txt_masp" id="">
            </td>
        </tr>
        <tr>
            <td>Tên sản phẩm</td>
            <td>
                <input type="text" name="txt_tensp" id="">
            </td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td>
            <?php  if(isset($_FILES['fileUpload'])){
                    $file_name = $_FILES['fileUpload']['name'];
                    $file_tmp =$_FILES['fileUpload']['tmp_name'];
                        if(empty($errors)==true){
                        move_uploaded_file($file_tmp,"public/images/".$file_name);
                        }
                     }?>
                <input type="file" name="fileUpload" id="uploadimage" /></td>
            </td>
        </tr>
        <tr>
            <td>Đơn giá</td>
            <td>
                <input type="text" name="txt_dongia" id="">
            </td>
        </tr>
        <tr>
            <td>Số lượng</td>
            <td>
                <input type="text" name="txt_soluong" id="">
            </td>
        </tr>
        <tr>
            <td>Khuyến mại</td>
            <td>
                <input type="text" name="txt_khuyenmai" id="">
            </td>
        </tr>
        <tr>
            <td>Ngày nhập hàng</td>
            <td><?php echo date('d/m/y') ?></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Lưu" name ="btn_save">
            </td>
        </tr>
    </table>
</form>
<tr>
    <td colspan="2">
        <a href="javascript:history.back()" class="back">BACK</a>
    </td>
</tr>
