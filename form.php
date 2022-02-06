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
<?php require "validation.php" ?>
<h1>Add New User</h1>
<div class="container">
   <form action="<?= $_SERVER['PHP_SELF']?> "method="post">
  <!-- 2 column grid layout with text inputs for the first and last names -->
      <div class="form-outline mb-4">
      <label class="form-label" for="full_name">Full name</label>
        <input type="text" id="full_name" name="full_name" class="form-control" />
        <span class="text-danger">* <?php echo $fullNameErr;?></span>
      </div>
      
  <!-- username input -->
  <div class="form-outline mb-4">
      <label class="form-label"  for="username">Username</label>
        <input type="text" name="username" id="username" class="form-control" />
        <span class="text-danger">* <?php echo $usernameErr;?></span>
    </div>
    
      <!-- password input -->
  <div class="form-outline mb-4">
      <label class="form-label" for="password">Password</label>
        <input id="password" type="password" name="password" placeholder="Password" class="form-control" >
        <span class="text-danger">* <?php echo $passwordErr;?></span>
      </div>
    <div class="form-outline mb-4">
      <label class="form-label" for="confirmPassword">Confirm Password</label>
        <input id="confirmPassword" type="password" name="confirmPassword" placeholder="confirmPassword" class="form-control" >
        <span class="text-danger">* <?php echo $confirmPasswordErr;?></span>
      </div>
      <div class="form-outline mb-4">
        <!-- email input -->
         <label class="form-label" for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control" />
        <span class="text-danger">* <?php echo $emailErr;?></span>
      </div>
<!-- birth_date input -->
  <div class="form-outline mb-4"> 
  <label class="form-label" for="birth_date">Birth Date:</label>
  <input class="form-control" type="date" id="birth_date" name="birth_date">
  <span class="text-danger">* <?php echo $birthdateErr;?></span>
</div>
  <!-- city input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="city">City</label>
    <select class="form-control " name="city">
        <option >Cairo</option>
        <option >Giza</option>
        <option >Sohag</option>
        <option >Qena</option>
    </select>
    <span class="text-danger">* <?php echo $cityErr;?></span>
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Register</button>

</form>
</div>
<!-- insert part -->
<?php
if(isset($_POST['full_name'])&&isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['confirmPassword'])&&isset($_POST['email'])&&isset($_POST['birth_date'])&&isset($_POST['city'])){
    $full_name=$_POST['full_name'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $confirmPassword=$_POST['confirmPassword'];
    $email=$_POST['email'];
    $birth_date=$_POST['birth_date'];
    $city=$_POST['city'];

    if(!empty($full_name)&&!empty($username)&&!empty($password)&&!empty($confirmPassword)&&!empty($email)&&!empty($birth_date)&&!empty($city)){
        require "connection.php";
        $query=$connection->prepare("INSERT INTO users (full_name,username,password,email,birth_date,city)VALUES(?,?,?,?,?,?)");
        $query->execute([$full_name,$username,$password,$email,$birth_date,$city]);
        header("Location: index.php");
    }else{
        echo" you entered empty values";
    }
}
?>
</body>
</html>
