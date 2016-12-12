<?php
$servername = "localhost";
$username = "root";
$password = "root";
$database = "dawm08mysql";

try {

    $conn = new PDO("mysql:host=$servername;dbname=$database", 
                        $username,
                        $password,
                        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	if(isset($_GET["id"])){
		$id = $_GET["id"];
		$stmt = $conn->prepare("SELECT * FROM books WHERE book_id= :id");
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$book = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if($book){
			
	?>			<form action="../action/doDeleteBook.php" method="post" style="color:red">
					Id: <input type="text" name="book_id" value="<?= $book['book_id']?>" readonly/><br/>
						Title: <input type="text" name="title" value="<?= $book['title']?>"/><br/>
						Name: <input type="text" name="author" value="<?= $book['author']?>"/><br/>
						Surname: <input type="text" name="genre_id" value="<?= $book['genre_id']?>"/><br/>
						<input type="submit" name="doDelete" value="Delete"/>
				</form>
				<a href="../">Back</a>
				
<?php
		}else{
			print_r("ERROR");
		}
		
	}
    // Close connection
    $db = null;
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>

