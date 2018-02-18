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
                <li><a href="form.php">Kullanıcı Kayıt</a></li>
                <li class="active"><a href="liste.php">Liste</a></li>

            </ul>

        </div>
    </div>
</nav>
</head>
<body>
<div class="container">
    <?php
    include "baglanti.php";

    $sql="SELECT id,isim,email FROM kullanicilar";

    if($sonuc=mysqli_query($baglanti,$sql)){

        if(mysqli_num_rows($sonuc) > 0)
            echo "<table class='table table-striped'>";
        echo "<thead>";
        echo "<tr>";
        echo " <th>ID</th>";
        echo "  <th>İsim</th>";
        echo " <th>Email</th>";
        echo " <th>Düzenle</th>";
        echo " <th>Sil</th>";
        echo "  </tr>";
        echo "  </thead>";
        echo "  <tbody>";
        while($row = mysqli_fetch_array($sonuc)){
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['isim']."</td>";
            echo "<td>".$row['email']."</td>";
            ?>
            <td>
                <a href="islemler.php?id=<?php echo $row['id']; ?>"

                    <img src="./img/duzelt.png" alt="Kaydı Düzenle" class="img-thumbnail" width="5%" height="5%"/>
                </a>
            </td>

            <td>
                <a href="liste.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Kayıt Silinecek Emin Misiniz?');">
                    <img src="./img/sil.png" alt="Kaydı Düzenle" class="img-thumbnail" width="2%" height="2%"/>

                </a>


            </td>
            <?php

        }
    }
    echo "</tbody>";?>
<?php






            $id = $name = $email = $password = "";
            $username = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $id = $_POST['id'];
                $name = $_POST['isim'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $username = $_POST['username'];



             $sql = "DELETE  FROM calisan WHERE id=$id";

                if ($baglanti->query($sql) === TRUE) {
                    echo "Kayıt Silindi";
                } else {
                    echo "Error: " . $sql . "<br>" . $baglanti->error;
                }
                mysqli_close($baglanti);


            }

    echo " </table>";


?>

</div>

</body>
</html>
