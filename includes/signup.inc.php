<?php
if (isset($_POST['submit-signup'])) {
    require 'dbh.inc.php';

    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['pwd'];
    $passwordRepeat=$_POST['pwd-re'];

    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: ../signup.php?error=emptyfields&username=".$username."&mail=".$email);
        exit();
    }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)&&!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
        header("Location: ../signup.php?error=invalidUserEmail");
        exit();
    }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invalidEmail&username=".$username);
        exit();
    }elseif (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
        header("Location: ../signup.php?error=invalidUsername&mail=".$email);
        exit();
    }elseif ($password !== $passwordRepeat) {
        header("Location: ../signup.php?error=passwordcheck&username=".$username."&mail=".$email);
    }else {
        $sql = "SELECT userName FROM usrInfo WHERE userName=?";
        $stmnt = mysqli_stmt_init($conn);                           //Initializes a statement and returns an object for use with mysqli_stmt_prepare
        if (!mysqli_stmt_prepare($stmnt,$sql)) {                    //Prepare an SQL statement for execution
            header("Location: ../signup.php?error=sqlerror1");
            exit();
        }else{
            mysqli_stmt_bind_param($stmnt,"s", $username);          //Binds variables to a prepared statement as parameters
            mysqli_stmt_execute($stmnt);                            //Executes a prepared Query
            mysqli_stmt_store_result($stmnt);                       //Transfers a result set from a prepared statement
            $resultcheck=mysqli_stmt_num_rows($stmnt);              //mysqli_stmt_num_rows - Return the number of rows in statements result set
            if ($resultcheck>0) {
                header("Location: ../signup.php?error=usernametaken&mail=".$email);
                exit();
            }else {
                $sql="INSERT INTO usrInfo (userName, userEmail, userPass) VALUES (?,?,?)";
                $stmnt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmnt,$sql)) {
                    header("Location: ../signup.php?error=sqlerror2");
                    exit();
                }else{
                    $hashedPass=password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmnt,"sss", $username, $email, $hashedPass);
                    mysqli_stmt_execute($stmnt);
                    header("Location: ../signup.php?error=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmnt);                                  //Closes a prepared statement
    mysqli_close($conn);                                             //Closes a previously opened database connection
}else {
    header("Location: ../signup.php");
    exit();
}
