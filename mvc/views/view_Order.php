<?php
if (!empty($_SESSION['cart'])) {
    $obj = new customer();
    if (isset($_POST['bntupdate'])) {
        foreach ($_POST['quantity'] as $ma_sp => $newQuantity) {
            // Kiểm tra xem số lượng mới có hợp lệ không
            $newQuantity = intval($newQuantity); // Đảm bảo số lượng là kiểu số nguyên

            if ($newQuantity >= 0) { // Kiểm tra số lượng không âm
                // Gọi hàm updateAddtocart để cập nhật giỏ hàng
                $obj->updateAddtocart($ma_sp, $newQuantity);
            }
        }
    }

    // if(isset($_POST['soluong']))
    // {
    //  $obj->updateAddtocart($_POST['ma_sp'], $_POST['soluong']);
    // }
    ?>
    <style>


    </style>

    <link rel="stylesheet" href="../public/CSS/order.css">

    <form action="" method="post">
        <h1>Giỏ hàng</h1>
       <div>
           <table >

               <tr>
                   <td>ProductID</td>
                   <td>Name</td>
                   <td>Image</td>
                   <td>Quantity</td>
                   <td>Price</td>
                   <td>Delete</td>
               </tr>
               <?php
               foreach($_SESSION['cart'] as $k=> $v)
               {?>
                   <tr>
                       <td><?php echo $v['ma_sp']?></td>
                       <td><?php echo $v['tensp']?></td>
                       <td>
                           <img src="http://localhost/PHP/public/images/<?php echo $v['hinhanh']?>" width="50" alt=" ">
                       </td>
<!--                       <td><input type="number" name="quantity[--><?php //echo $v['ma_sp'] ?><!--]"  value="--><?php //echo $v['qty'] ?><!--" style="width: 50px; border:none;"></td>-->
                       <td><?php echo $v['qty']?></td>
                       <td><?php echo $v['giakm']*$v['qty'] ?></td>
                       <td>
                           <a href="http://localhost/PHP/order/deleteinorder/<?php echo $v['ma_sp']?>" style="text-decoration: none; color: red">Delete</a>

                       </td>
                       <td>

                       </td>
                   </tr>
               <?php }?>
           </table>
       </div>
<!--        <input type="submit" value="lưu" name="bntupdate">-->
        <h1>Thông tin khách hàng</h1>

    </form>
    <?php

    $txt_ten_kh = isset($_POST['txt_ten_kh']) ? $_POST['txt_ten_kh'] : "";
    $txt_dienthoai = isset($_POST['txt_dienthoai']) ? $_POST['txt_dienthoai'] : "";
    $txt_email = isset($_POST['txt_email']) ? $_POST['txt_email'] : "";
    $txt_dc_lh = isset($_POST['txt_dc_lh']) ? $_POST['txt_dc_lh'] : "";
    $txt_dc_gh = isset($_POST['txt_dc_gh']) ? $_POST['txt_dc_gh'] : "";
    $ma_hd = rand(0, 99999);
    $ma_hd = substr($ma_hd, 0, 5);

    if (isset($_POST['btnsave'])) {
        $obj->Buy($ma_hd, $txt_ten_kh, $txt_dienthoai, $txt_email, $txt_dc_lh, $txt_dc_gh);
        // $obj->Buy($txt_ma_kh, $txt_ten_kh, $txt_dienthoai, $txt_email, $txt_dc_lh, $txt_dc_gh);
        $obj->insert( $txt_ten_kh, $txt_dienthoai, $txt_email, $txt_dc_lh, $txt_dc_gh);
        //$makh, $tenkh, $dienthoai, $email, $diachilienhe, $diachigiaohang
    }

    ?>

    <form action="" method="post" enctype="multipart/form-data">


        Tên KH <br> <input type="text" name="txt_ten_kh" required> <br>
        Điện thoại <br> <input type="text" name="txt_dienthoai" required> <br>
        Email <br> <input type="text" name="txt_email" required> <br>
        Địa chỉ liên hệ <br> <input type="text" name="txt_dc_lh" required> <br>
        Địa chỉ giao hàng <br> <input type="text" name="txt_dc_gh" required> <br>


        <br>
        <input type="submit" value="Mua hàng" name="btnsave">
        <br><br>


        </table>

    </form>

    <?php
} else {
    echo '<p>Giỏ hàng trống</p>';
}
?>
