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
		$stmt = $conn->prepare("SELECT * FROM users WHERE id= :id");
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if($user){
			print_r($user);
			
	?>			<form action="../action/doEdit.php" method="post">
					Id: <input type="text" name="id" value="<?= $user['id']?>" readonly/><br/>
						Email: <input type="text" name="email" value="<?= $user['email']?>"/><br/>
						Name: <input type="text" name="name" value="<?= $user['name']?>"/><br/>
						Surname: <input type="text" name="surname" value="<?= $user['surname']?>"/><br/>
						Registered: <input type="text" name="registered" value="<?= $user['registered']?>"/><br/>
						LastLogin: <input type="text" name="lastLogin" value="<?= $user['lastLogin']?>"/><br/>
						Password: <input type="password" name="password" value="<?= $user['password']?>"/><br/>
						<input type="submit" name="update" value="Update"/>
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
