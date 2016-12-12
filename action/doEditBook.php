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

    
    
    if(isset($_POST["update"])){
	$id=$_POST["book_id"];
    $title=$_POST["title"];
    $author=$_POST["author"];
    $genre_id=$_POST["genre_id"];

        $stmt = $conn->prepare("UPDATE books SET title=:title,
                                               author=:author,
                                               genre_id=:genre_id                                         
                                            WHERE book_id=:id");
     
    $stmt->bindParam("id", $id);
    $stmt->bindParam("title", $title);
    $stmt->bindParam("author", $author);
    $stmt->bindParam("genre_id", $genre_id);
    // Execute the update
    $stmt->execute();
    header("Location: ../");
	}

    // Close connection
    $db = null;
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>

