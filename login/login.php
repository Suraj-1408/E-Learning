<?php
session_start();
$conn = pg_connect("host=localhost dbname=postgres user=postgres password=paswan9741") or die("Unable to connect to database");
if(isset($_POST['email1']) && isset($_POST['pass1']) && isset($_POST['submit1']))
{
    function validate($data)
    {
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }

    $temail=validate($_POST['email1']);
    $pass=validate(md5($_POST['pass1']));

    $insert="SELECT * from registration where email='$temail' AND password='$pass' ";

    $r=pg_query($conn,$insert);

    if(pg_num_rows($r)===1)
    {
        $row=pg_fetch_assoc($r);

        if($row['email']===$temail && $row['password']===$pass)
        {
            $_SESSION['temail']=$row['email'];
            $_SESSION['pass']=$row['password'];
            $_SESSION['name']=$row['name'];
            echo "<script type=\"text/javascript\">
            alert(\"Login Sucessfully!!\");
            window.location='/Project/Student/teach.php';
            </script>";
        }
    }

    else{
        echo "<script type=\"text/javascript\">
            alert(\"invalid!!\");
            window.location='login.html';
            </script>";
    }
}
?>
