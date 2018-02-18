<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {height: 450px}

        /* Set gray background color and 100% height */
        .sidenav {
            padding-top: 20px;
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }
            .row.content {height:auto;}
        }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li ><a href="index.php">Home</a></li>
                <li class="active"><a href="form.php">Kullanıcı Kayıt</a></li>
                <li><a href="liste.php">Liste</a> </li>

            </ul>

        </div>
    </div>
</nav>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">

        </div>
        <div class="col-sm-8 text-left">
            <h2>Kullanıcı Kayıt Formu</h2>
<div>

    <?php
    include ("baglanti.php");
    ?>

    <div class="container" style="background: center" >
        <form class="form" action =" <?php echo $_SERVER['PHP_SELF']?>" method="post">
            <div class="form-group">
                <label for="usrid">ID</label>
                <input type="text"   name="id" class="form-control"  placeholder="id">
            </div>
            <div class="form-group">
                <label for="isim">İsim</label>
                <input type="text"   name="isim"class="form-control"  placeholder="isim">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text"   name="email"class="form-control" >
            </div>
            <div class="form-group">
                <label for="sifre">Şifre </label>
                <input type="password" name="password"class="form-control" >
            </div>
            <div class="form-group">
                <label for="comment">Kullanıcı Adı</label>
                <input type="text" name="username" class="form-control" >
            </div>
<div>   <button type="submit" class="btn btn-default" name="save">Kaydet</button></div>


            <?php

            include ("baglanti.php");


            $id = $name = $email = $password = "";
            $username = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $id = $_POST['id'];
                $name = $_POST['isim'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $username = $_POST['username'];



                $sql ="INSERT INTO  kullanicilar (id,isim,email,sifre,kullaniciadi) VALUES('$id','$name','$email','$password','$username')";

                if ($baglanti->query($sql) === TRUE) {
                    echo "Kayıt Eklendi";
                } else {
                    echo "Error: " . $sql . "<br>" . $baglanti->error;
                }
                mysqli_close($baglanti);


            }

            ?>
        </form>



</div>
        </div>

    </div>
</div>

<footer class="container-fluid text-center">
    <p>Kübra Utman</p>
</footer>

</body>
</html>