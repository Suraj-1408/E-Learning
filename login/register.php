<?php
session_start();
$conn = pg_connect("host=localhost dbname=postgres user=postgres password=paswan9741") or die("Unable to connect to database");
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['submit2']))
{
    $_SESSION['email']=$_POST['email'];
    $_SESSION['name']=$_POST['name'];
    $_SESSION['pass']=$_POST['pass'];

    $create="CREATE TABLE IF NOT EXISTS registration(id SERIAL PRIMARY KEY, name varchar(50), email varchar(50) UNIQUE NOT NULL, password varchar(50))";
    $insert="INSERT INTO registration(name,email,password) VALUES ('".$_POST['name']."','".$_POST['email']."','".md5($_POST['pass'])."')";
    $r1=pg_query($conn,$create);
    $r2=pg_query($conn,$insert);
    if(!$r1 || !$r2)
    {
        echo "<script type=\"text/javascript\">
            alert(\"invalid!!\");
            window.location='login.html';
            </script>";
    }
    else
    {
        echo "<script type=\"text/javascript\">
            alert(\"Registration Sucessfull!!\");
            window.location='login.html';
            </script>";
    }
}
?>
