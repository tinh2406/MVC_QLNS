<html>
    <head>
        <style>
            li{
                list-style: none;   
                padding: 8px 20px;
            }
            li:hover{
                color: rgb(52, 52, 52);
                background: rgb(163, 163, 163);
            }
            a{
                text-decoration: none;
                color: black;

            }
        </style>
    </head>
    <body>
        <div class="sidebar">
            <ul>
                <li><a href="../controller/C_NhanVien.php" target="Data">Xem nhan vien</a></li>
                <li><a href="../controller/C_PhongBan.php" target="Data">Xem phong ban</a></li>
                <li><a href="../controller/C_NhanVien.php?find" target="Data">Tim kiem</a></li>
                <li><a href="../controller/C_NhanVien.php?add" target="Data">Them nhan vien</a></li>
                <li><a href="../controller/C_PhongBan.php?add" target="Data">Them phong ban</a></li>
                <li><a href="../controller/C_PhongBan.php?update" target="Data">Cap nhat</a></li>
                <li><a href="../controller/C_NhanVien.php?delete" target="Data">Xoa</a></li>
                <li><a href="../controller/C_NhanVien.php?deletes" target="Data">Xoa tat ca</a></li>
                <li><a href="../controller/C_Admin.php?logout" target="Data">Logout</a></li>
            </ul>
        </div>
    </body>
</html>