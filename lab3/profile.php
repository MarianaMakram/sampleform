<?php

if(isset($_POST["sub"])){
    $email = $_POST["email"];
    $emailPattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
    $password = $_POST["password"];
    $pawdpattern = "/^[a-z0-9_]{8}$/";   //// (only lowercase & _)
    $confirmPWD = $_POST["Cpassword"];


    // email validation

    if(!preg_match($emailPattern,$email)){
        
        $errors["email"]="enter valid mail";
    }

    //// password validation

    if (!preg_match($pawdpattern, $password)) {

        $errors["password"]="password must be 8digite (numbers,char in lowercase ,_)";
    }

    if ($password!=$confirmPWD) {
        
        $errors["cpassword"]="incorrect confirm";

    }


    ////image validation

    if(isset($_FILES["pc"])){

        $filename=$_FILES["pc"]["name"];
        $tempPath=$_FILES["pc"]["tmp_name"];
        $fileSize=$_FILES["pc"]["size"];
        $explodName=explode(".",$filename);
        $ext=end($explodName);
        $extarray=["jpg","JPG","png","PNG","jpeg","JPEG","gif","GIF"];

        if(in_array($ext,$extarray)){

            move_uploaded_file($tempPath,"images/".$filename);

        }else{
    
            $errors["pc"]="upload image only.";
        }
    }

}

/////////error handling

if(isset($errors)){

    $urlerrors=urlencode(serialize($errors));
    header("Refresh:0;URL=lab3.php?errors=".$urlerrors);

}else {?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>

    <style>

    div{
        display : inline-block;
        width : 30%;
        border : solid 2px lightblue;
        text-align : center;
    }

    p{
        font-size:1.5em;
    }
    </style>
</head>
<body>
    <br><br>
    <div>
    <img src="images/<?php echo $_FILES["pc"]["name"]; ?>" alt="">
    <h1>Welcome <?php echo $_POST["uname"];?></h1>
    <p>Your Email : <?php echo $_POST["email"];?></p>
    <p>You select : <?php echo $_POST["room"];?> Room</p>
    <p>With EXT : <?php echo $_POST["Ext"];?> Room</p>
    </div>
    
</body>
</html>

<?php    
}

?>



