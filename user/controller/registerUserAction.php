<?php
    require_once('../../include/dbConn.php');
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    if(isset($_POST['register'])):
        $fullName = $_POST['fullName'];
        $gender = $_POST['gender'];
        $username = $_POST['username'];
        $filename = $_FILES['passportSize']['name'];
        $position = $_POST['position'];
        $password = $_POST['password'];
        $dateAdded = $_POST['dateAdded'];
        $dateAdded = date("Y-m-d H:i:s"); 
        $dateModified = $_POST['dateModified'];
        $dateModified = '0000-00-00 00:00:00';
        $password = md5($password);
        // destination of the file on the server
        
        
        // destination of the file on the server
        $destination = '../../upload/' . $filename;

        // get the file extension
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        // the physical file on a temporary uploads directory on the server
        $file = $_FILES['passportSize']['tmp_name'];
        $size = $_FILES['passportSize']['size'];

        if (!in_array($extension, ['png', 'jpg', 'jfif'])):
            $_SESSION['error'] = "You file extension must be .png, .jpg";
            header('location:../view/?key=error');
    
        elseif ($_FILES['passportSize']['size'] > 1000000): // file shouldn't be larger than 1Megabyte
            $_SESSION['error'] = "File too large!"; 
            header('location:../view/?key=error');
    
        else:
            // move the uploaded (temporary) file to the specified destination
            if (move_uploaded_file($file, $destination)):
                $registerCategory = $conn->query("INSERT INTO `user` VALUES (null, '$fullName', '$gender', '$username',  '$filename', '$position', '$password', '$dateAdded', '$dateModified') ");
                $registerCategory = $conn->query("INSERT INTO `systemlogs` VALUES (null, 'Staff Registration', '1', '$dateAdded') ");
                if($registerCategory):
                    $_SESSION['success'] = "New User Registered";
                    header('location:../view/?key=success');
                else:           
                    $conn->query("INSERT INTO systemlogs VALUES(NULL, 'Fail To Register Staff', '1', current_timestamp()) ");
                   $_SESSION['error'] = "Fail In Registration, Try Again";
                   header('location:../view/?key=error');
                endif;
            endif;
        endif;
    endif;
?>