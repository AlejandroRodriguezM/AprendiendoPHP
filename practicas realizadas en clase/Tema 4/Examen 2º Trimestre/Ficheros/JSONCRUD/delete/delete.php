<?php
    $filename="miembros.json";
    $delete_id=$_GET['delete_id'];
    $data = file_get_contents($filename);
	$data = json_decode($data, true);
    unset($data[$delete_id]);
    $data=array_values($data);

    $data=json_encode($data,JSON_PRETTY_PRINT);
    file_put_contents('miembros.json',$data);
    header("location:index.php");
?>