<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>
<body>
<?php
include('header.php');
?>
<div class="container" style="margin-top:40px;">
    <?php
    
    if($_SESSION['id']!=0){

        $_SESSION['id']=0;
        $_SESSION['id_korisnika']='0';
        echo"<div class='alert alert-success alert-dismissable' role='alert' style='margin-top:30px;'>
                    <strong>Uspešna odjava!</strong> <br>
                    </div>";
        header('Refresh: 0; URL = login.php');



    }
 
    ?>
    </div>
</body>
</html>