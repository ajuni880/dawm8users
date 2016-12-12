<?php
$servername = "localhost";
$username = "root";
$password = "root";
$database = "dawm08mysql";
# Example (PDO)
# Insert Data With PDO (+ Prepared Statements)
# The following example uses prepared statements.
# We use PDO beacuse its portability
# We use prepared statements, because its enhaced security
# we use FETCH_ASSOC, theoretically faster because are basic types
try {
    echo "----- Connection -----";
    echo "<br/>";
    $conn = new PDO("mysql:host=$servername;dbname=$database", 
                        $username,
                        $password,
                        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                        
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    
    if(isset($_POST["ok"])){
	$id=$_POST["id"];
    $name=$_POST["name"];
    
    $stmt = $conn->prepare("INSERT INTO genres (genre_id,name) VALUES (:id,:name)");
	$stmt->bindParam("id", $id);
    $stmt->bindParam("name", $name);

    // Execute the INSERT
    $stmt->execute();
    header("Location:../view/genres.php");
	}

    // Close connection
    $db = null;
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>

