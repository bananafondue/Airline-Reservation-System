<?php 
include 'config.php';
include 'fpdf.php';

session_start();

if (!isset($_SESSION['U_Email_ID'])) {
    header("Location: index.php");
}

if(isset($_POST['submit'])){
    header("Location: ticket.php");
}

?>

<!DOCTYPE html>
<html lang="en">
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airlplane Booking System</title>
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
        width="40"
        height="40"
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
          margin-left: 20px;  r
          font-family: 'Signika', sans-serif;
          color: grey;
          "
        ><u>Logout</u></a>
      </nav>
    
      <form method="POST" class="p-2 m-2">

          <h2>Your Ticket has been Booked!</h2>
          <button name="submit" type="submit" class="btn btn-primary">Click here to generate your ticket pdf</button>
        </form>
</body>
</html>