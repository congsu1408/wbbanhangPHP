<!DOCTYPE html>
<html>
<link rel="stylesheet" href="http://localhost/PHP/public/CSS/style.css">
<style>
    .promotion-badge {
        background-color: #f44336;
        color: white;
        padding: 5px 10px;
        font-size: 12px;
        border-radius: 4px;
    }
    .delete {
        background-color: #d52a1a;
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
    .edit {
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
    .add {
        /*vị trí nút add ở góc dưới bên phải bảng table*/
        position: fixed;
        right: 25%;
        z-index: 100;
        background-color: #4CAF50;
        color: white;
        margin: 10px 2px;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;

    }
</style>
<body>

<main>
    <?php
    $obj = new product();

    ?>
    <!--CSS-->

    <table border="1">
        <tr >
            <td>Mã loại sản phẩm</td>
            <td>Mã sản phẩm</td>
            <td>Tên sản phẩm</td>
            <td>Hình ảnh</td>
            <td>Đơn giá</td>
            <td>Số lượng</td>
            <td>Khuyến mãi</td>
            <td>Giá khuyến mãi</td>
            <td>Sửa</td>
            <td>Xóa</td>
        </tr>
        <?php
        foreach ($data as $key => $value) {
            $promotionLogo = '';
            if ($value['khuyenmai'] != 0) {
                $promotionLogo = '<span class="promotion-badge">SALE</span>';
            }
            ?>
            <tr>
                <td>
                    <?php echo $value['ma_loaisp'] ?>
                </td>
                <td>
                    <?php echo $value['ma_sp'].$promotionLogo ?>
                </td>
                <td>
                    <?php echo $value['tensp'] ?>
                </td>
                <td>
                    <img src="../../public/images/<?php echo $value['hinhanh'] ?>" width="50" alt="">
                </td>
                <td>
                    <?php echo $value['dongia'] ?>
                </td>
                <td>
                    <?php echo $value['soluong'] ?>
                </td>
                <td>
                    <?php echo $value['khuyenmai'] ?>%
                </td>
                <td>
                    <?php echo $value['giakm'] ?>
                </td>


                <td><a href="http://localhost/PHP/product/showIFProduct/<?php echo $value['ma_sp'] ?>" class="edit">Sửa</a></td>
                <td><a href="http://localhost/PHP/product/delete/<?php echo $value['ma_sp'] ?>" class="delete">Xóa</a></td>
            </tr>
        <?php } ?>
    </table>
    <a href="http://localhost/PHP/product/getProductID/" class="add">Thêm</a>
</main>

<footer>
</footer>
</body>
</html>
