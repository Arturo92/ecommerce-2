<?php
define('DB_USER', 'root');
define('DB_PASSWORD', 'Csharp92');
define('DB_SERVER', 'localhost');
define('DB_NAME', 'db');


if (!$db = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME)) {
	die($db->connect_errno.' - '.$db->connect_error);
}

$arr = array();

if (!empty($_POST['keywords'])) {
	$keywords = $db->real_escape_string($_POST['keywords']);
	$sql = "SELECT id, name, page_name FROM womenpumps WHERE name LIKE '%".$keywords."%' UNION SELECT id, name, page_name FROM womenhandbags WHERE name LIKE '%".$keywords."%'";
	$result = $db->query($sql) or die($mysqli->error);
	if ($result->num_rows > 0) {
		while ($obj = $result->fetch_object()) {
			$arr[] = array('id' => $obj->id, 'title' => $obj->name, 'page_name' => $obj->page_name);
		}
	}
}
echo json_encode($arr);
