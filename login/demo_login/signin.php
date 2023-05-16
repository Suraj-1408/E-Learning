<?php
$con=pg_connect("host=localhost dbname=project user=postgres password=kiran") or die("Error");
$pgsql ="INSERT INTO sign_in (email,password,password_encrypted) VALUES ('$_POST['email']','$_POST['password']')";
pg_query($query) or die("Error while insertind");
echo "Created successfully";
pg_close($con);
?>
