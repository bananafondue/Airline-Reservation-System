<?php 
include 'config.php';

session_start();

if (!isset($_SESSION['U_Email_ID'])) {
    header("Location: index.php");
}

$flightno = $_SESSION['flightno'];

if(isset($_POST['submit'])){

$P_Firstname = $_POST['P_Firstname']; 
$P_Lastname = $_POST['P_Lastname'];
$P_Email = $_POST['P_Email'];
  $_SESSION['P_Email'] = $P_Email;

$P_Phonenumber = $_POST['P_Phonenumber'];
$P_Age = $_POST['P_Age'];
$P_Gender = $_POST['P_Gender'];
$P_Address = $_POST['P_Address'];


$sql = "INSERT INTO `project`.`passenger`(`P_Firstname`, `P_Lastname`, `P_Email`, `P_Phonenumber`, `P_Age`, `P_Gender`, `P_Address`, `flightno`) VALUES ('$P_Firstname', '$P_Lastname', '$P_Email', '$P_Phonenumber', '$P_Age', '$P_Gender', '$P_Address', '$flightno');";

$result = mysqli_query($conn, $sql);  
  if($result){
    header("location: done.php");
  }

$conn->close();

}

?>

<!DOCTYPE html>
<html>
  <head>
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
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Signika:wght@500&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <nav class="navbar navbar-light" style="background-color: #a5f5d6">
      <a
        class="navbar-brand"
        style="
          font-size: 25px;
          margin-left: 20px;
          font-family: 'Signika', sans-serif;
        "
        href="welcome.php"
      >
        <img
          src="https://cdn-icons-png.flaticon.com/512/187/187820.png"
          width="35"
          height="35"
          class="d-inline-block align-top"
          alt=""
          style="margin-right: 10px"
        />
        Airline Reservation
      </a>
      <a
        class="nav-item nav-link"
        href="logout.php"
        style="
          font-size: 25px;
          margin-left: 20px;
          font-family: 'Signika', sans-serif;
          color: grey;
        "
        ><u>Logout</u></a
      >
    </nav>
    <div class="p-4 m-4 d-flex justify-content-center">
      <form method="POST" action="booking.php">
        <div class="row">
          <div class="mb-3 col-md-6">
            <label class="form-label"
              >First Name<span class="text-danger">*</span></label
            >
            <input
              type="text"
              class="form-control"
              name="P_Firstname"
              id="P_Firstname"
              required
            />
          </div>
          <div class="mb-3 col-md-6">
            <label class="form-label"
              >Last Name<span class="text-danger">*</span></label
            >
            <input
              type="text"
              class="form-control"
              name="P_Lastname"
              id="P_Lastname"
              required
            />
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label"
            >Email<span class="text-danger">*</span></label
          >
          <input type="email" class="form-control" name="P_Email" required />
        </div>
        <div class="mb-3">
          <label class="form-label">
            Phone Number<span class="text-danger">*</span></label
          >

          <input
            type="number"
            class="form-control"
            id="P_Phonenumber"
            name="P_Phonenumber"
            required
          />
        </div>
        <div class="form-group d-flex">
          <div class="mb-3 col-md-6">
            <label>Age<span class="text-danger">*</span></label>
            <input
              type="number"
              name="P_Age"
              id="P_Age"
              class="form-control"
              required
            />
          </div>

          <div class="mb-3 mx-3 pe-3 col-md-6">
            <label>Gender<span class="text-danger">*</span></label>
            <select id="P_Gender" name="P_Gender" class="form-select" required>
              <option value="1">Male</option>
              <option value="2">Female</option>
              <option value="3">Non Binary</option>
              <option value="4">I prefer not to say</option>
            </select>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label required"
            >Enter Your Address<span class="text-danger">*</span></label>
          <textarea name="P_Address" class="form-control"></textarea>
        </div>
        <div class="modal-footer">
          <button name="submit" type="submit "class="btn btn-primary">Submit</button>
          <button class="btn btn-danger">Cancel</button>
        </div>
      </form>
    </div>
  </body>
</html>
