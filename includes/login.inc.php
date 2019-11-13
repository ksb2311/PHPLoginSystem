<?php
if (isset($_POST['loginBtn'])) {
    
    require 'dbh.inc.php';
    $mailid=$_POST['emailid'];
    $password=$_POST['pws'];

    if (empty($mailid) || empty($password)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    }else{
        $sql="SELECT * FROM usrinfo WHERE userName=? OR userEmail=?;";
        $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: ../index.php?error=sqlerror1");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt,"ss", $mailid, $mailid);
            mysqli_stmt_execute($stmt);
            $result=mysqli_stmt_get_result($stmt);
            if ($row=mysqli_fetch_assoc($result)) {
                $passCheck=password_verify($password, $row['userPass']);
                if ($passCheck==false) {
                    header("Location: ../index.php?error=wrongpass");
                    exit();
                }elseif ($passCheck==true) {
                    session_start();
                    $_SESSION['id']=$row['userID'];
                    $_SESSION['uname']=$row['userName'];
                    header("Location: ../index.php?login=success");
                    exit();

                }else{
                    header("Location: ../index.php?error=nouser1");
                    exit();
                }
            }else{
                header("Location: ../index.php?error=nouser2");
                exit();
            }
        }
    }

}else {
    header("Location: ../index.php");
    exit();
}