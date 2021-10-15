<?php
  $farmer_name = $_POST['farmer_name'];
  $contact_no = $_POST['contact_no'];
  $product_name = $_POST['product_name'];
  $product_quantity = $_POST['product_quantity'];
  $product_price = $_POST['product_price'];
  $product_desc = $_POST['product_desc'];

// Database connection
  $conn = new mysqli('localhost','root','','project');
  if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
  } else {
    $stmt = $conn->prepare("insert into add_details_1(farmer_name, contact_no, product_name, product_quantity, product_price, product_desc) values(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $farmer_name, $contact_no, $product_name, $product_quantity, $product_price, $product_desc);
    $execval = $stmt->execute();
    echo $execval;
    echo "Uploaded successfully...";
    $stmt->close();
    $conn->close();
  }

?>