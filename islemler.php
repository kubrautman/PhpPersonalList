<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<?php
include "baglanti.php";
$id=$_GET['id'];
?>
<?php
$sql="SELECT id,isim,email,sifre,kullaniciadi from kullanicilar WHERE id=".$id;



if($sonuc=mysqli_query($baglanti,$sql)) {


if( $row = mysqli_fetch_array($sonuc)) {
        echo "<div class='container'>";
        echo "<form class='form' action =" ?><?php echo $_SERVER['PHP_SELF'] ?>"<?php echo "method='post'>";
        echo " <div class='form-group'>";
        echo " <label for='usrid'>Id</label>";
        echo "   <input type='text'   name='id' class='form-control' value=".$row['id'].">";
        echo " </div>";
        echo "<div class='form-group'>";
        echo " <label for='isim'>İsim</label>";
        echo "<input type='text'   name='gorev' class='form-control' value=".$row['isim'].   ">";
        echo " </div>";
        echo " <div class='form-group'>";
        echo " <label for='email'>Email </label>";
        echo " <input type='text' name='email' class='form-control' value=".$row['email'].">";
        echo "</div>";
        echo "<div class='form-group'>";
        echo " <label for='sifre'>Şifre </label>";
        echo "<input type='text' name='password' class='form-control'  value=".$row['sifre']." >";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='username'>Kullanıcı Adı</label>";
        echo "<input  type='text'  name='yorum'  class='form-control' value=".$row['kullaniciadi'].">";
        echo "</div>";


    }

}
?>
<button type='submit' class='btn btn-default' >Güncelle</button>
<label><a href="liste.php?">Liste</a></label>







</body>
</html>
