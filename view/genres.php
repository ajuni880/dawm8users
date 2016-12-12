
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


    $stmt = $conn->prepare("SELECT * FROM genres");
    $stmt->execute();
    $genres = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
	<a href="addGenre.php">New</a>
	<table border="1">
		<thead>
			<th>id</th>
			<th>Name</th>		
		</thead>
 <?php foreach($genres as $key => $genre){ ?>
	<tr>
		<td><?= $genre['genre_id']?></td>
		<td><?= $genre['name']?></td>
		<td><a href="deleteGenre.php?id=<?= $genre['genre_id']?>">delete</a> |<a href="editGenre.php?id=<?= $genre['genre_id']?>">edit</a> </td>

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

