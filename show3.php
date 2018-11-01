
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
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
echo "<br>";echo "<br>";

$sql = "SELECT * FROM eLib WHERE subjects = 'descriere' and price < 30";
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
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
  <a href="index.html" class="btn btn-info" role="На главную страницу"">На главную страницу</a>
</body>
</html>