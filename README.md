# csdlass2_final
Quản lí chuỗi cửa hàng sql server
Source code phần riêng của từng thành viên được đặt vào 3 folder.
Folder giao diện chứa code ứng dụng php thao tác với sql server.
Hướng dẫn kết nối php với sql server bằng XAMPP: 
1. Tải ODBC driver for sql server
2. Tải Microsoft Drivers for PHP for SQL Server
3. Copy file sqlsrv.dll hoặc pdo_sqlsrv.dll (32 or 64 bit tùy vào XAMPP) vào thư mục xampp/php/ext
4. Thêm vào file php.init các file trên: extension=sqlsrv.dll
5. Khởi động lại Apache trên XAMPP
=> Các API php để thao tác với sql server: https://php.net/manual/en/book.sqlsrv.php
