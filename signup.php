<?php
include 'config.php';

if (isset($_SESSION['U_Email_ID'])) {
    header("Location: index.php");
}

if(isset($_POST['submit'])){

$U_Lastname = $_POST['U_Lastname']; 
$U_Age = $_POST['U_Age'];
$U_Gender = $_POST['U_Gender'];
$U_Firstname = $_POST['U_Firstname'];
$U_Email_ID = $_POST['U_Email_ID'];
$U_PhoneNumber = $_POST['U_PhoneNumber'];
$pass_word = $_POST['pass_word'];
$confirm_pass = $_POST['confirm_pass'];
$password_err = "";


// if(empty(trim($_POST['pass_word']))){
//     $password_err = "Password cannot be blank";
//     echo "<script>alert('Password cannot be blank.')</script>";
// }

// elseif(strlen(trim($_POST['pass_word'])) < 5){
//     $password_err = "Password cannot be less than 5 characters";
//     echo "<script>alert('Password cannot be less than 5 characters.')</script>";
// }

// else{
//     $password = trim($_POST['pass_word']);
// }

// Check for confirm password field
if(trim($_POST['pass_word']) == trim($_POST['confirm_pass'])){
  // $param_password = password_hash($pass_word, PASSWORD_DEFAULT);

  $sql = "SELECT * FROM user WHERE `U_Email_ID`='$U_Email_ID'";
  $result =  mysqli_query($conn, $sql); 

  if(!$result->num_rows > 0){ 
    $sql = "INSERT INTO `project`.`user` (`U_Lastname`, `U_Age`, `U_Gender`, `U_Firstname`, `U_Email_ID`, `U_PhoneNumber`, `pass_word`) VALUES ('$U_Lastname', '$U_Age', '$U_Gender', '$U_Firstname', '$U_Email_ID', '$U_PhoneNumber', '$pass_word');";

    $result = mysqli_query($conn, $sql);
    if($result){
      echo "<script>alert(User Registration Completed.')</script>";
      $U_Email_ID = "";
      $pass_word = "";
      $confirm_pass = "";
      header("location: index.php");
    }
    else{ 
      echo "<script>alert('Something went wrong!')</script>";
    }
  }  
  else{
      echo "<script>alert('Oops email already exists')</script>";
  }
}
else{
  echo "<script>alert('Password Not Matched.')</script>";
}

$conn->close();

}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Sign-Up Form</title>
    <link rel="stylesheet" type="text/css" href="signup.css" />
    <link rel="preconnect" href="https://fonts.goog leapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Koh+Santepheap:wght@700;900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="d-flex justify-content-center">
      <div class="col-md-4 mt-5 bg-light shadow">
        <img src="signupimage.png" style="width: 100%" />
      </div>
      <div class="col-md-4">
        <div class="signup-form bg-light shadow">
          <form class="mt-5 border p-4"  method="post" action="signup.php">
            <h4 class="mb-3 text-secondary">Sign Up</h4>
            <div class="row">
              <div class="mb-3 col-md-6">
                <label>First Name<span class="text-danger">*</span></label>
                <input
                  type="text"
                  name="U_Firstname"
                  id="U_Firstname"
                  class="form-control"
                  required
                />
              </div>

              <div class="mb-3 col-md-6">
                <label>Last Name<span class="text-danger">*</span></label>
                <input
                  type="text"
                  name="U_Lastname"
                  id="U_Lastname"
                  class="form-control"
                  required
                />
              </div>

              <div class="mb-3 col-md-12">
                <label>Your Email<span class="text-danger">*</span></label>
                <input
                  type="email"
                  name="U_Email_ID"
                  id="U_Email_ID"
                  class="form-control"
                  required
                />
              </div>

              <div class="mb-3 col-md-12">
                <label>Phone Number<span class="text-danger">*</span></label>
                <input
                  type="number"
                  name="U_PhoneNumber"
                  id="U_PhoneNumber"
                  class="form-control"
                  required
                />
              </div>
              <div class="form-group d-flex">
                <div class="mb-3 col-md-6">
                  <label>Age<span class="text-danger">*</span></label>
                  <input
                    type="number"
                    name="U_Age"
                    id="U_Age"
                    class="form-control"
                    required
                  />
                </div>

                <div class="mb-3 mx-3 pe-3 col-md-6">
                  <label>Gender<span class="text-danger">*</span></label>
                  <select id="U_Gender" name="U_Gender" class="form-select" required>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                    <option value="3">Non Binary</option>
                    <option value="4">I prefer not to say</option>
                  </select>
                </div>
              </div>
              <div class="form-group d-flex">
                <div class="mb-3 col-md-6 pe-3">
                  <label>Password<span class="text-danger">*</span></label>
                  <input
                    type="password"
                    name="pass_word"
                    id="pass_word"
                    class="form-control"
                    required
                  />
                </div>

                <div class="mb-3 col-md-6">
                  <label
                    >Confirm Password<span class="text-danger">*</span></label
                  >
                  <input
                    type="password"
                    name="confirm_pass"
                    id="confirm_pass"
                    class="form-control"
                    required
                  />
                </div>
              </div>
              <div class="col-md-12">
                <button name="submit" type="submit" class="btn btn-primary float-end">Signup Now</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
