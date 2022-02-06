<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
<?php
if(isset($_GET["id"])&&!empty($_GET['id'])){
    require "connection.php";
    require "validation.php" ;
    $id=$_GET['id'];
    $query=$connection->prepare("Select * FROM users WHERE id=?");
    $query->execute([$id]);

    $user=$query->fetchAll(PDO::FETCH_ASSOC);?>

    <h3>Edit User: <?=$user[0]['full_name']?></h3>
    <div class="container">
        <form action="update.php" method="get">
<!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="form-outline mb-4">
                <label class="form-label" for="full_name">Full name</label> <input type="hidden" name="id" value="<?=$user[0]['id']?>">
                <input type="text" id="full_name" name="full_name" class="form-control" value="<?=$user[0]['full_name']?>"/>
                <span class="text-danger">* <?php echo $fullNameErr;?></span>
            </div>    
<!-- username input -->
            <div class="form-outline mb-4">
                <label class="form-label"  for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control"  value="<?=$user[0]['username']?>"/>
                <span class="text-danger">* <?php echo $usernameErr;?></span>
            </div>
<!-- password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="password">Password</label>
                <input id="password" type="password" name="password" placeholder="Password" class="form-control" value="<?=$user[0]['password']?>"/>
                <span class="text-danger">* <?php echo $passwordErr;?></span>
            </div>
            <div class="form-outline mb-4">
                <label class="form-label" for="confirmPassword">Confirm Password</label>
                <input id="confirmPassword" type="password" name="confirmPassword" placeholder="confirmPassword" class="form-control" value="<?=$user[0]['confirmPassword']?>">
                <span class="text-danger">* <?php echo $confirmPasswordErr;?></span>
            </div>
<!-- email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="<?=$user[0]['email']?>"/>
                <span class="text-danger">* <?php echo $emailErr;?></span>
            </div>
<!-- birth_date input -->
        <div class="form-outline mb-4"> 
                <label class="form-label" for="birth_date">Birth Date:</label>
                <input class="form-control" type="date" id="birth_date" name="birth_date" value="<?=$user[0]['birth_date']?>">
                <span class="text-danger">* <?php echo $birthdateErr;?></span>
        </div>
<!-- city input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="city">City</label>
            <select class="form-control " name="city">
                <option value="Cairo"<?=($user[0]['city']=="Cairo")?"selected":"";?>>Cairo</option>
                <option value="Giza"<?=($user[0]['city']=="Giza")?"selected":"";?>>Giza</option>
                <option value="Sohag"<?=($user[0]['city']=="Sohag")?"selected":"";?>>Sohag</option>
                <option value="Qena"<?=($user[0]['city']=="Qena")?"selected":"";?>>Qena</option>
            </select>
            <span class="text-danger">* <?php echo $cityErr;?></span>
        </div>

<!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Register</button>

        </form>
    </div>

<?php }else{
    header("Location: index.php");
}
?>
</body>
</html>
