<?php
session_start();
$conn = pg_connect("host=localhost dbname=postgres user=postgres password=paswan9741") or die("Unable to connect to database");
if(isset($_POST['temail1']) && isset($_POST['tpass1']) && isset($_POST['tsubmit1']))
{
    function validate($data)
    {
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }

    $temail=validate($_POST['temail1']);
    $pass=validate(md5($_POST['tpass1']));

    $insert="SELECT * from Instructor_register where email='$temail' AND password='$pass' ";

    $r=pg_query($conn,$insert);

    if(pg_num_rows($r)===1)
    {
        $row=pg_fetch_assoc($r);

        if($row['email']===$temail && $row['password']===$pass)
        {
            $_SESSION['temail']=$row['email'];
            $_SESSION['tpass1']=$row['password'];
            $_SESSION['tname']=$row['name'];
            echo "<script type=\"text/javascript\">
            alert(\"Login Sucessfully!!\");
            window.location='/Project/Teacher/Instructor.php';
            </script>";
        }
    }

    else{
        echo "<script type=\"text/javascript\">
            alert(\"invalid!!\");
            window.location='tlogin.php';
            </script>";
    }
}
?>
