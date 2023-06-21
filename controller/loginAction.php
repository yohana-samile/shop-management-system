<?php
    require_once('../include/dbConn.php');
    if(isset($_POST['logMeIn'])):
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = md5($password);
        
        if(empty($username) && empty($password)):
            $_SESSION['error'] = "all field are mandatory";
            header('location:../index.php?key=error');
        else:
            $findUSer = $conn->query("SELECT * FROM user, userrole WHERE user.position = userrole.roleId AND user.username = '$username' AND user.password = '$password' limit 1");
            if(mysqli_num_rows($findUSer) > 0):
                $userResult = mysqli_fetch_array($findUSer);
                $_SESSION['userData'] = $userResult;
                $setLogs = $conn->query("INSERT INTO systemlogs VALUES (null, 'login in the system', {$_SESSION['userData']['userId']}, current_timestamp() ) ");
                if($setLogs):                    
                    header('location:../view/');
                endif;
            else:
                $_SESSION['error'] = "Wrong Username Or Password";
                header('location:../index.php?key=error');
            endif;
        endif;
    endif;
?>