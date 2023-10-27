<?php
require_once "header.php";
?>
<link rel="stylesheet" href="../public/CSS/addtocart.css">
<link rel="stylesheet" href="../../public/CSS/addtocart.css">
<style>
    .order{
        position: fixed;
        bottom: 20px;
        left: 20px;
        z-index: 100;
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
    }
    .order:hover{
        background-color: #45a049;
    }
    .back{
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 100;
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
    }
</style>

<table class="cart-table" >

    <h2>GIỎ HÀNG</h2>
    <tr>
        <td>Mã sản phẩm</td>
        <td>Tên sản phẩm</td>
        <td>Hình ảnh</td>
        <td>Số lượng</td>
        <td>Đơn giá</td>
        <td>Xóa</td>
    </tr>
    <?php
    foreach ($_SESSION['cart'] as $key => $value) { ?>
        <tr>
            <td><?php echo $value['ma_sp'] ?> </td>
            <td><?php echo $value['tensp'] ?></td>
            <td style="text-align: center">
                <img src="http://localhost/PHP/public/images/<?php echo $value['hinhanh'] ?>" width="50" alt=" ">
            </td>
            <td>
                <form id="updateForm_<?php echo $value['ma_sp']; ?>" action="http://localhost/PHP/order/updateAddtocartID/<?php echo $value['ma_sp'] ?>" method="post">
                    <input type="number" name="new_qty" value="<?php echo $value['qty']; ?>" min="1">
                    <input type="submit" value="Cập nhật"  id="update_button_<?php echo $value['ma_sp']; ?>">
                </form>
            </td>
<!--            Calculate the discounted price-->
            <td><?php echo $value['giakm']*$value['qty'] ?></td>

            <td>
                <a href="http://localhost/PHP/order/deleteaddtocart/<?php echo $value['ma_sp'] ?>" class="delete-link">Delete</a>
            </td>
        </tr>

    <?php } ?>
</table>
<td >
    <a href="http://localhost/PHP/customer/show" class="order">Đặt hàng</a>
</td>


<tr>
    <td colspan="2">
        <a href="javascript:history.back()" class="back">BACK</a>
    </td>
</tr>

<script>
    // Cập nhật số lượng sản phẩm trong giỏ hàng
    function updateCartItemQuantity(productID) {
        var newQty = document.getElementById("updateForm_" + productID).elements["new_qty"].value;

        // Gửi yêu cầu AJAX để cập nhật số lượng sản phẩm trong giỏ hàng
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "http://localhost/PHP/order/updateAddtocartID/" + productID);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("new_qty=" + newQty);
    }

    // Thêm sự kiện click cho nút cập nhật
    document.querySelectorAll(".cart-table .update-form").forEach(function(form) {
        form.addEventListener("submit", function(event) {
            event.preventDefault();

            // Cập nhật số lượng sản phẩm trong giỏ hàng
            updateCartItemQuantity(form.id);
        });
    });

</script>
