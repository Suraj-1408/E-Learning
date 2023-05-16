<?php
session_start();
$conn = pg_connect("host=localhost dbname=postgres user=postgres password=paswan9741") or die("Unable to connect to database");
if(isset($_POST['tname']) && isset($_POST['temail']) && isset($_POST['tpass']) && isset($_POST['tsubmit2']) && isset($_POST['text1']))
{
    $_SESSION['temail']=$_POST['temail'];
    $_SESSION['tname']=$_POST['tname'];
    $_SESSION['tpass']=$_POST['tpass'];
    $_SESSION['text1']=$_POST['text1'];
    $create="CREATE TABLE IF NOT EXISTS Instructor_register(tid SERIAL PRIMARY KEY, name varchar(50), email varchar(50) UNIQUE NOT NULL, password varchar(50), field varchar(100))";
    $insert="INSERT INTO Instructor_register(name,email,password,field) VALUES ('".$_POST['tname']."','".$_POST['temail']."','".md5($_POST['tpass'])."','".$_POST['text1']."')";
    $r1=pg_query($conn,$create);
    $r2=pg_query($conn,$insert);
    if(!$r1 || !$r2)
    {
        echo "<script type=\"text/javascript\">
            alert(\"invalid!!\");
            window.location='tlogin.html';
            </script>";
    }
    else
    {
        echo "<script type=\"text/javascript\">
            alert(\"Registration Sucessfull!!\");
            window.location='tlogin.html';
            </script>";
    }
}
?>
