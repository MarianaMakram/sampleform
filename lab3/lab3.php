<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lab3</title>
</head>
<body>
    
    <h1>Add User</h1>

    <?php
        if(isset($_GET["errors"])){$errors=unserialize($_GET["errors"]);}
    ?>

    <form method="post" enctype="multipart/form-data" action="profile.php">
    
        <label for="name">Name</label>
        <input type="text" id="name" name="uname" required> 
        <br><br>

        <label for="mail">Email</label>
        <input type="email" id="mail" name="email" required>
        <span style="color: red;"><?=(isset($errors["email"]))?$errors["email"]:"";?></span>
        <br><br>

        <label for="pwd">Password</label>
        <input type="password" id="pwd" name="password" required>
        <span style="color: red;"><?=(isset($errors["password"]))?$errors["password"]:"";?></span>
        <br><br>

        <label for="cpwd">Confirm password</label>
        <input type="password" id="cpwd" name="Cpassword" required>
        <span style="color: red;"><?=(isset($errors["cpassword"]))?$errors["cpassword"]:"";?></span>
        <br><br>

        <label for="room">Room No.</label>
        <select class="" name="room" id="room">
            <option value="Application1">Application1</option>
            <option value="Application2">Application2</option>
            <option value="cloud">cloud</option>
        </select>
        <br><br>
    
        <label for="Ext">Ext</label>
        <input type="text" id="Ext" name="Ext" required>
        <br><br>

        <label for="pc">Profile picture</label>
        <input type="file" id="pc" name="pc" required>
        <span style="color: red;"><?=(isset($errors["pc"]))?$errors["pc"]:"";?></span>

        <br><br>

        <input type="submit" name="sub" value="save">
        <input type="reset" name="reset" value="reset">

    </form>


</body>


</html>