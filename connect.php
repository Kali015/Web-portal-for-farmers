<?php
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $number = $_POST['number'];

  // Database connection
  $conn = new mysqli('localhost','root','','project');
  if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
  } else {
    $stmt = $conn->prepare("insert into registration(firstName, lastName, gender, email, password, number) values(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $number);
    $execval = $stmt->execute();
    echo $execval;
    echo "Registration successfully...";
      echo'<li>Click on the below webpage link,to go to our web page:</li>';
    echo'<li><a href="box.html" target="_blank">our webpage</a></li>';

    $stmt->close();
    $conn->close();
  }
?>