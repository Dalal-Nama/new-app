<!DOCTYPE html>
<html>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "app";
if(isset($_POST['update']))
{
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$address=$_POST['address'];


$sql = "UPDATE user SET name='$name',email='$email',password='$password',address='$address' WHERE id=1";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
}
?>



<h3>Edit Data </h3>

<div>
  <form action="editprofile.php" method='POST'>
    <label for="fname"> Name</label>
    <input type="text" id="fname" name="name" require>

    <label for="lname">Email </label>
    <input type="text" id="lname" name="email" require>

    <label for="lname">Password </label>
    <input type="text" id="lname" name="password" require>

    <label for="lname">Address </label>
    <input type="text" id="lname" name="address" require>


    <!-- <label for="country">Country</label>
    <select id="country" name="country">
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select> -->
  
    <input type="submit" name="update" value="Submit">
  </form>
</div>

</body>
</html>
