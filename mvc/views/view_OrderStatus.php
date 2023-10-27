<form action="" method="post">
    <h1>Quản lý đơn hàng</h1>
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
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }


        /* css cho phần sửa thành dạng nút bấm */
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
    </style>
    <table border="1">

        <tr>
            <td>Mã Hóa Đơn</td>
            <td>Tên khách hàng</td>
            <td>Số điện thoại</td>
            <td>Email</td>
            <td>Địa chỉ liên hệ</td>
            <td>Địa chỉ giao hàng</td>
            <td>Tổng tiền</td>
            <td>Trạng thái</td>
            <td>Sửa</td>
        </tr>
        <tr>
            <?php
            foreach ($data as $key => $value) {  ?>
        <tr>
            <td><?php echo $value['maHD'] ?></td>
            <td><?php echo $value['tenkh'] ?></td>
            <td><?php echo $value['dienthoai'] ?></td>
            <td><?php echo $value['email'] ?></td>
            <td><?php echo $value['diachi_lienhe'] ?></td>
            <td><?php echo $value['diachi_giaohang'] ?></td>
            <td><?php echo $value['tongtien'] ?></td>
            <td><?php echo $value['trangthai'] ?></td>
            <td><a href="http://localhost/PHP/order/showOSWmaHD/<?php echo $value['maHD'] ?>" class="edit">Sửa</a></td>
        </tr>
        <?php
        }
        ?>
        </tr>
        </tbody>
    </table>
</form>
