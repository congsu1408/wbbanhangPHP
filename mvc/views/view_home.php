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


</style>
<body>

<main>
    <?php
    $obj = new home1;
    $obj->show();

    ?>
    <!--CSS-->
    <table border="1">
        <tr >
            <td>Mã sản phẩm</td>
            <td>Tên sản phẩm</td>
            <td>Hình ảnh</td>
            <td>Chi tiết</td>
            <td>Thêm vào giỏ hàng</td>
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
                    <?php echo $value['ma_sp'].$promotionLogo ?>
                </td>
                <td>
                    <?php echo $value['tensp'] ?>
                </td>
            <td>
                <img src="public/images/<?php echo $value['hinhanh'] ?>" width="50" alt="">
            </td>
            <td>
                <a href="home/getproductID/<?php echo $value['ma_sp'] ?>" class="btn-detail">Detail </a>
            </td>
            <br>
            <td> <a href="order/addtocart/<?php echo $value['ma_sp'] ?>" class="btn-add">Addtocard </a></td>
</tr>
    <?php } ?>
    </table>
</main>

<footer>
</footer>
</body>
</html>
