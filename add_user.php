<?php

include("conn.php");

echo $name = $_POST["name"];
echo $id_card = $_POST["id_card"];
echo $number = $_POST["number"];
echo $image = $_POST["image"];
echo $user_name = $_POST["user_name"];
echo $user_pass = $_POST["user_pass"];
echo $org = $_POST["org"];
echo $dep = $_POST["dep"];
echo $dep2 = $_POST["dep2"];


$temp = explode(".", $_FILES["image"]["name"]);
$image = round(microtime(true)) . '.' . end($temp);
move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $image);

$sql = "INSERT INTO user (name, id_card, `number`, image, user_name, user_pass, organization_id,	department_id,department2_id,status)
VALUES ('{$name}', '{$id_card}', '{$number}', '{$image}', '{$user_name}', '{$user_pass}', '{$org}', '{$dep}', '{$dep2}','1')";

if ($conn->query($sql) === TRUE) {
   header("location: index.php");
}
  else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
