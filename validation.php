<!-- validation -->
<?php
// define variables and set to empty values
$fullNameErr = $usernameErr =$passwordErr= $confirmPasswordErr= $emailErr =$birthdateErr=$cityErr ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["full_name"])) {
    $fullNameErr = "Full Name is required";
  } else {
    $full_name = test_input($_POST["full_name"]);
    // check if full_name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$full_name)) {
      $fullNameErr = "Only letters and white space allowed";
    }
  }
  if (empty($_POST["username"])) {
    $usernameErr = "Username is required";
  } else {
    $username = test_input($_POST["username"]);
    // check if username only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$username)) {
      $usernameErr = "Only letters and white space allowed";
    }
  }
  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
    // check if password only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$password)) {
      $passwordErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["confirmPassword"])) {
    $confirmPasswordErr = "ConfirmPassword is required";
  } else {
    $confirmPassword = test_input($_POST["confirmPassword"]);
    $password=$_POST['password'];
    $confirmPassword=$_POST['confirmPassword'];
    if($password!=$confirmPassword){
        $confirmPasswordErr ="Passward is not the same";
    }
    // check if confirmPassword only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$confirmPassword)) {
      $confirmPasswordErr = "Only letters and white space allowed";
    }
  }
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  if (empty($_POST["birth_date"])) {
    $birthdateErr = "Birth Date is required";
  } else {
    $birth_date = test_input($_POST["birth_date"]);
  }
  if (empty($_POST["city"])) {
    $cityErr = "City is required";
  } else {
    $city = test_input($_POST["city"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!-- old date form -->