<?php  
$con=pg_connect("host=localhost dbname=project user=postgres password=kiran") or die("Error");
$pgsql ="INSERT INTO sign_up (name,email,password) VALUES ('$_POST['name']','$_POST['email']','$_POST['password']')";
$con->exec($pgsql);
pg_query($query) or die("Error while insertind");
echo "Created successfully";
pg_close($con);
?>




















