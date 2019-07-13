<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
}
.continer-class {
    margin-top: 70px;
    background-color: antiquewhite;
}
.image-class {
    margin-left: 100px;
}
.class-body {
    background-color: aliceblue;
}

</style>
<body class="class-body">
<div class="continer-class">
<img src="Tulip.jpg" alt="Smiley face" width="200" height="200" class="image-class">
<br>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "app";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, name, email ,password,address FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {


        // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";
        echo "<table>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>Name</th>";
                echo "<th>Email</th>";
                echo "<th>Password</th>";
                echo "<th>Address</th>";
                echo "<th>Edit</th>";
               
             
            echo "</tr>";
          
        
            echo "<tr>";
              echo "<td>1</td>";
              echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row['password'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td > <a href=editprofile.php > Edit </a> </td>";
              
               
               
           
            echo "</tr>";

       
        echo "</table>";
        
    }
} else {
    echo "0 results";
}
?>
</div>
<div class="w3-container">


<p> <a  href="index.html"> <button class="w3-button w3-block w3-teal">LOGOUT </button> </a></p>


</div>
</body>
