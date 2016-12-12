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


    $stmt = $conn->prepare("SELECT * FROM books");
    $stmt->execute();
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
	<a href="addBook.php">New</a>
	<a href="../index.php">Back</a>
	<table border="1">
		<thead>
			<th>id</th>
			<th>Title</th>
			<th>Author</th>
			<th>Genre_id</th>
		</thead>
 <?php foreach($books as $key => $book){ ?>
	<tr>
		<td><?= $book['book_id']?></td>
		<td><?= $book['title']?></td>
		<td><?= $book['author']?></td>
		<td><?= $book['genre_id']?></td>
		<td><a href="deleteBook.php?id=<?= $book['book_id']?>">delete</a> |<a href="editBook.php?id=<?= $book['book_id']?>">edit</a> </td>

	</tr>
  <?php  } ?>
</table>
<?php
    // Close connection
    $db = null;
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>

