<?php

include 'conn.php';


if ($_POST['type'] == "") {
	$sql = "SELECT * FROM district_tb";

	$query = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

	$str = "";
	while ($row = mysqli_fetch_assoc($query)) {
		$str .= "<option value='{$row['dist_id']}'>{$row['district_name']}</option>";
	}
} else if ($_POST['type'] == "upzilaData") {

	$sql = "SELECT * FROM upzila_tb WHERE dist_id = {$_POST['id']}";

	$query = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

	$str = "";
	$str .= "<option value=''>Select Upzila</option>";
	while ($row = mysqli_fetch_assoc($query)) {

		$str .= "<option value='{$row['uid']}'>{$row['upzila_name']}</option>";
	}
}

echo $str;
