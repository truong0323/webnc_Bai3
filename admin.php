<?php 
        $sqlcon = mysqli_connect('localhost', 'root', '', 'baithuchanhweb');
        if (!$sqlcon) {
            die("Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error());
        }
            $sql = "SELECT * FROM categories";
            $result = mysqli_query($sqlcon,$sql);
        
            // Kiểm tra xem truy vấn có thành công không
            if (!$result) {
                die("Truy vấn thất bại: " . mysqli_error($sqlcon));
            }
            if (isset($_POST['submit-insert_category'])) {
                $name = $_POST['name'];
                $display_order = $_POST['soluong'];
        
                // Thực hiện truy vấn chèn danh mục vào cơ sở dữ liệu
                $insert_sql = "INSERT INTO categories (name_category, soluong) VALUES ('$name', '$display_order')";
                if (mysqli_query($sqlcon, $insert_sql)) {
                    echo "<script>alert('Thêm danh mục thành công!');</script>";
                    header("Location: admin.php");
            exit();
                } else {
                    echo "<script>alert('Thêm danh mục thất bại!');</script>";
                }
            }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <title>Admin</title>
</head>
<body>
    <header>
    <div class="title bg-light">
            <h1 class="text-center">Home Page</h1>
        </div>
        <div class="bg-dark" style="height: 100px;"></div>
        <div class="container bg-light ">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#"><img src="./images/LOGO.svg" alt=""></a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Quản lí danh mục </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Quản lí sản phẩm</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                      </li>
                    </ul>
                  </div>
                </div>
            </nav>
        </div>

        

    </header>
    <div class="container my-5">
        <h2>Quản lý danh mục</h2>
        <!-- Form thêm danh mục -->
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Tên danh mục</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
           
          
            <div class="mb-3">
                <label for="display_order" class="form-label">Số lượng</label>
                <input type="number" class="form-control" id="display_order" name="soluong" value="0">
            </div>
            
            <button type="submit" class="btn btn-primary" name="submit-insert_category">Lưu danh mục</button>
        </form>

        <!-- Bảng hiển thị danh mục -->
        <h3 class="mt-5">Danh sách danh mục</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    
                    <th scope="col">Tên danh mục</th>
                    <th scope="col">Số lượng</th>
                    
                </tr>
            </thead>
            <tbody>
                <!-- Giả sử bạn đã lấy dữ liệu danh mục từ cơ sở dữ liệu -->
                <?php while($row = mysqli_fetch_array($result) ){
                ?>
                    <tr>
                        
                        <td><?=$row['name_category']?> </td>
                        <td><?=$row['soluong']?></td>
                        
                        <td>
                            <button class="btn btn-warning btn-sm">Sửa</button>
                            <button class="btn btn-danger btn-sm">Xóa</button>
                        </td>
                    </tr>

                <?php
                }
                ?>
                
            </tbody>
        </table>
    </div>
    
    <footer class="border-top border-danger m-5">
        <div class="container mt-5">
            <div class="row">
                <div class="col-4">
                    <img src="./images/LOGO.svg" alt="">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci officiis iste delectus earum nihil architecto est reiciendis saepe et molestiae quos exercitationem beatae cumque, quia sed sequi nostrum porro aut!</p>
                </div>
                <div class="col-2">
                    <h3>GET HELP</h3>
                    <p>Contact Us</p>
                    <p>Latest Articles</p>
                    <p>FAQ</p>
                </div>
                <div class="col-3">
                    <h3>PROGRAMS</h3>
                    <p>Art and design</p>
                    <p>Business</p>
                    <p>IT and Software</p>
                    <p>Language</p>
                    <p>Programming</p>
                </div>
                <div class="col-3">
                    <h3>CONTACT US</h3>
                    <p>Address: 2321 New Design Str, Lorem Ipsum10 Hudson Yards, USA</p>
                    <p>Tel: + (123) 2500-567-8988
                    Mail: supportlms@gmail.com</p>
                </div>
            </div>
        </div>

    </footer>
</body>

</html>