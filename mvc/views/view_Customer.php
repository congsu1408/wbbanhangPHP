<form action="" method="post">
    <h1>Quản lý khách hàng</h1>
    <table border="1">

        <tr>
            <td>Tên khách hàng</td>
            <td>Số điện thoại</td>
            <td>Email</td>
            <td>Địa chỉ liên hệ</td>
            <td>Địa chỉ giao hàng</td>
            <td>Sửa</td>
            <td>Xóa</td>
        </tr>
        <tr>
            <?php
            foreach ($data as $key => $value) {  ?>
        <tr>
            <td><?php echo $value['tenkh'] ?></td>
            <td><?php echo $value['dienthoai'] ?></td>
            <td><?php echo $value['email'] ?></td>
            <td><?php echo $value['diachi_lienhe'] ?></td>
            <td><?php echo $value['diachi_giaohang'] ?></td>
            <td><a href="http://localhost/PHP/customer/showIForCustomer/<?php echo $value['makh'] ?>" class="edit">sửa</a></td>
            <td><a href="http://localhost/PHP/customer/delete/<?php echo $value['makh'] ?>" class="delete">xóa</a></td>
        </tr>
        <?php
        }
        ?>
        </tr>
        </tbody>
    </table>
</form>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
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
    .edit:hover{
        background-color: #45a049;
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
    .delete:hover{
        background-color: #761c19;
    }
</style>
