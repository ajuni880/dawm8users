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
    $title=$_POST["title"];
    $author=$_POST["author"];
    $genre_id=$_POST["genre_id"];
    
    $stmt = $conn->prepare("INSERT INTO books (title, author, genre_id) VALUES (:title, :author, :genre_id)");
    
    $stmt->bindParam("title", $title);
    $stmt->bindParam("author", $author);
    $stmt->bindParam("genre_id", $genre_id);
    // Execute the INSERT
    $stmt->execute();
	}

    // Close connection
    $db = null;
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>

