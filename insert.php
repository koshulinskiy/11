<!DOCTYPE html>
<html lang="en">
<head>
  <title>Users</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "31.10.2018";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
echo "<br>";echo "<br>";
$sql = "INSERT INTO eLib 
VALUES ('".$_POST['id']."','".$_POST['title']."','".$_POST['author']."', '".$_POST['year']."','".$_POST['publishing']."','".NULL."', '".NULL."')";
if ($conn->query($sql) === TRUE) {
   echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
echo "<br>";
echo "<br>";
echo "<a href = 'index.html'> Назад</a>";
echo '<div class="container col-md-3"> ';
$sql = "SELECT * FROM eLib ";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo '<table border =1 class="table table-striped">';
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>title</th>";
                echo "<th>author</th>";
                echo "<th>year</th>";
                echo "<th>publishing</th>";
                echo "<th>subjects</th>";
                echo "<th>price</th>";
            echo "</tr>";

        while($row = mysqli_fetch_array($result)){
            echo "<tr>";

                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['author'] . "</td>";
                echo "<td>" . $row['year'] . "</td>";
                echo "<td>" . $row['publishing'] . "</td>";
                echo "<td>" . $row['subjects'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
            echo "</tr>";

        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} 
echo '</div>';

?>

  <a href="index.html" class="btn btn-info" role="На главную страницу"">На главную страницу</a>




</body>
</html>