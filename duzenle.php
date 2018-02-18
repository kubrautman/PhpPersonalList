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
        <div>
            <?php
            include ("baglanti.php");

            $sql="SELECT isim,id,email,sifre,kullaniciadi from kullanicilar WHERE id=".$id;

            if($sonuc=mysqli_query($baglanti,$sql)) {



                if( $row = mysqli_fetch_array($sonuc)) {
                    echo "<div class='container'>";
                    echo "<form class='form' action =" ?><?php echo $_SERVER['PHP_SELF'] ?>"<?php echo "method='post'>";
                    echo " <div class='form-group'>";
                    echo " <label for='usr'>İsim</label>";
                    echo "   <input type='text'   name='isim' class='form-control' value=".$row['id'].">";
                    echo " </div>";
                    echo "<div class='form-group'>";
                    echo " <label for='gorev'>Görev</label>";
                    echo "<input type='text'   name='gorev' class='form-control' value=".$row['isim'].   ">";
                    echo " </div>";
                    echo " <div class='form-group'>";
                    echo " <label for='yas'>İşe Alınış </label>";
                    echo " <input type='date'   name='tarih' class='form-control' value=".$row['email'].">";
                    echo "</div>";
                    echo "<div class='form-group'>";
                    echo " <label for='yas'>Maaş </label>";
                    echo "<input type='text'   name='maas' class='form-control' value=".$row['sifre']." >";
                    echo "</div>";
                    echo "<div class='form-group'>";
                    echo "<label for='comment'>Yorum</label>";
                    echo "<textarea   name='yorum' rows='5' class='form-control' >".$row['kullaniciadi']."</textarea>";
                    echo "</div>";


                }

            }
            ?>
            <button type='submit' class='btn btn-default' >Güncelle</button>
            <label><a href="liste.php?">Liste</a></label>


<?php
mysqli_close($baglanti)?>



        </div>

</body>