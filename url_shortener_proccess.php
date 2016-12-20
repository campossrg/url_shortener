<?php
	include "includes\\connection.php";
	include "includes\\shortURL.php";

	if(isset($_POST['btn_submit'])){
		$url = $_POST['txt_url'];
		$short = new shortURL;	
		if(!empty($url)){
			try{
				$sql = $conn->prepare("INSERT INTO table_url_hash (url_name) VALUES (?)");
			
				//INSERT NEW ROW
				$sql->execute(array($url));

				//SELECT LAST ID
				$id = $conn->lastInsertId();

				//INSERT LAST ID
				$sql = $conn->prepare("UPDATE table_url_hash SET url_hash = ? WHERE url_id = {$id}");
				$sql->execute(array($short->encode($id)));
			}

			catch(PDOException $e){
				echo "<br> NUMERO 2 <br>";
				echo "Insert failed: " . $e->getMessage();
			}
		}
	}

	//PRG system implementation pendant
	
	header("url=url_shortener_index.php"); 
	exit();
?>