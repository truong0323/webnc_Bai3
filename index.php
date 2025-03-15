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

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body >
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
                        <a class="nav-link" href="#">Courses</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
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

    <main>
    <div class="slide-3 overflow-hidden" style="background-color: #FFF5BE; height: 380px;">
            <div class="container d-flex ">
                <div class="row justify-content-between align-items-center">
                    <div class="col-5 ">
                        <h2>Build Skills with 
                            Online Course</h2>
                        <p>We denounce with righteous indignation and dislike men who are so beguiled and demoralized that cannot trouble.</p>
                        <button class="btn btn-danger rounded-pill">Post comment</button>
                    </div>
                    <div class="col-4">
                        <img src="./images/87199a876bbb8c3054a77c35470fe35f.png" alt="" style="width: 100%; height: auto;">
                    </div>
                </div>
            </div>
            
        </div>

        <div class="container mt-5">
            <div class="head d-flex justify-content-between">
                <div>
                    <h2>Top category</h2>
                    <p>Explore our Popular Categories</p>
                </div>
                <div>
                    <button class="btn border rounded-pill">All categoris</button>
                </div>
              
            </div>
            <div class="d-flex flex-wrap" >
            <?php while($row = mysqli_fetch_array($result)){
            ?>
                 
                <div class="col-3 border rounded-3 d-flex justify-content-center" >
                    <a class="text-decoration-none text-dark" href="#" >
                        <i class="fa-solid fa-cookie text-center" ></i>
                        <p><?= $row['name_category'] ?></p>
                        <p><?= $row['soluong'] ?></p>
                    </a>
                </div>
            

           <?php
           }?>
           </div>
           

        </div>


    </main>

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