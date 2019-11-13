<?php
    require "header.php"
?>

    <main>
        <!-- <div class="wrapper-main"> -->
                <!-- <h3 style="text-align: center">SignUp to Enter Site</h3> -->
                <br>
                <div class="card border-secondary mb-3 mx-auto" style="max-width: 20rem;">
                <div class="card-header" align="center">SignUp</div>
                
                <div class="card-body">
                <?php
                        if(isset($_GET['error'])){
                            if($_GET['error'] == "emptyfields"){
                                echo '<p class="text-danger">Fill in all fields</p>'; 
                            }elseif($_GET['error'] == "invalidEmail"){
                                echo '<p class="text-danger">Invalid Email ID!</p>';
                            }elseif($_GET['error'] == "invalidUsername"){
                                echo '<p class="text-danger">Invalid User!</p>';
                            }elseif($_GET['error'] == "invalidUserEmail"){
                                echo '<p class="text-danger">Invalid Username and Email ID!</p>';
                            }elseif($_GET['error'] == "passwordcheck"){
                                echo '<p class="text-danger">Password do not match!</p>';
                            }elseif($_GET['error'] == "usernametaken"){
                                echo '<p class="text-danger">Username is already taken!</p>';
                        }elseif ($_GET['error'] == "success") {
                            echo '<p class="text-success">Signup successfull!</p>';
                        }
                    }
                ?>
                <form class="form-group" action="includes/signup.inc.php" method="post">
                    <div class="form-group">
                        <label for="InputUsername">Username</label>
                        <input class="form-control mr-sm-2" type="text" name="username" placeholder="Enter username" required>
                    </div>
                    <div class="form-group">
                        <label for="InputEmail">Email</label>
                        <input class="form-control mr-sm-2" type="email" name="email" placeholder="Enter E-mail" required>
                    </div>
                    <div class="form-group">
                        <label for="InputPassword">Password</label>
                        <input class="form-control mr-sm-2" type="password" name="pwd" placeholder="Enter password" required>
                    </div>
                    <div class="form-group">
                        <label for="InputPasswordRe" style="text-align: right">Enter Password again</label>
                        <input class="form-control mr-sm-2" type="password" name="pwd-re" placeholder="Enter password again" required>
                    </div>
                    <center><button class="btn btn-primary" type="submit" name="submit-signup">SignUp</button></center>
                </form>
                </div>
            </div>
            </div>

        <!-- </div> -->
    </main>

<?php
    require "footer.php"
?>