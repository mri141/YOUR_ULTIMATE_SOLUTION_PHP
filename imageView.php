<?php
require 'config.php';
	$conn = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
    mysql_select_db(DB_NAME) or die(mysql_error());
    if(isset($_GET['id'])) {

        $sql = "SELECT pic FROM products WHERE id=" . $_GET['id'];

		$result = mysql_query("$sql") or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysql_error());
		$row = mysql_fetch_array($result);

		header("Content-type: image/jpeg");
		// header("Content-type: " . $row["imageType"]);

        echo $row["pic"];

	}
	mysql_close($conn);
?>