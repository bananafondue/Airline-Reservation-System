<?php
include 'config.php';

session_start();

if (isset($_SESSION['U_Email_ID'])) {
    header("Location: welcome.php");
}


if(isset($_POST['submit'])){
    $U_PhoneNumber = $_POST['U_PhoneNumber'];
    // $pass_word = password_hash($_POST['pass_word'], PASSWORD_DEFAULT);
    $pass_word = $_POST['pass_word'];

    $sql = "SELECT * FROM user WHERE U_PhoneNumber='$U_PhoneNumber' AND pass_word='$pass_word'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['U_Email_ID'] = $row['U_Email_ID'];
		header("Location: welcome.php");
	} else {
		echo "<script>alert('Woops! Phone Number or Password is Wrong.')</script>";
	}
}
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Login Form</title>
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
      <div class="col-md-3 mt-5 bg-light shadow">
        <img src="loginimage.png" style="width: 100%" />
      </div>
      <div class="col-md-3">
        <div class="login-form bg-light shadow">
          <form class="mt-5 border p-4"  method="post" action="index.php">
            <h4 class="mb-3 text-secondary">Login</h4>
            <div class="row">

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
              
                <div class="mb-3 col-md-12">
                    <label>Password<span class="text-danger">*</span></label>
                    <input
                    type="password"
                    name="pass_word"
                    id="pass_word"
                    class="form-control"
                    required
                    />
                </div>
              <div class="col-md-12">
                <button name="submit" type="submit" class="btn btn-primary float-end">Log me in</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>