<?php
include('security.php');

// Live Check email already exists or not
if (isset($_POST['check_submit_btn'])) {
    $email = $_POST["email_id"];

    $email_query = "SELECT * FROM users WHERE email='$email'";
    $email_result = mysqli_query($connect, $email_query);

    if (mysqli_num_rows($email_result) > 0) {
        echo 'Email is already taken! Please Try another one.';
    } else {
        echo "It's Availible.";
    }
}

// for registeration
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $cpassword = $_POST['cpassword'];
    $usertype = $_POST['usertype'];

    // checking email
    $email_query = "SELECT * FROM `users` WHERE email='$email'";
    $email_result = mysqli_query($connect, $email_query);

    if (mysqli_num_rows($email_result) > 0) {

        $_SESSION['status'] = 'Email is already taken! Try another one.';
        $_SESSION['status_code'] = "error";
        header('location: register.php');
    } else {

        // if ($password === $cpassword) {
        // data insert to database method
        $sql = "INSERT INTO `users`(username, email, password, usertype) VALUES ('$username', '$email', '$password', '$usertype')";
        $result = mysqli_query($connect, $sql);

        if ($result) {
            $_SESSION['status'] = "Admin Profile Added Successfully";
            $_SESSION['status_code'] = "success";
            header('location: register.php');
        } else {
            $_SESSION['status'] = "Admin Profile is not Added";
            $_SESSION['status_code'] = "error";
            header('location: register.php');
        }
        // } else {
        //     echo 'both password Does not matched';
        //     $_SESSION['status'] = "both password Does not matched";
        //     $_SESSION['status_code'] = "warning";
        //     header('location: register.php');
        // }
    }
}



// login here!
if (isset($_POST['login_btn'])) {
    $email_login = $_POST['email'];
    $password_login = $_POST['password'];

    $sql = "SELECT * FROM `users` WHERE email='$email_login' AND password='$password_login' ";
    $result = mysqli_query($connect, $sql);
    $usertypes = mysqli_fetch_assoc($result);

    if ($usertypes['usertype'] == 'admin') {

        $_SESSION['username'] = $email_login;
        header('location: index.php');

    } else if ($usertypes['usertype'] == 'user') {

            $_SESSION['username'] = $email_login;
            if($usertypes['status'] == 1){
                header('location:../user/dashboard.php');

            }else{
                echo "Please contact to admin";
            }
    } else {
        $_SESSION['status'] = 'email id and password are invalid';
        header('location: login.php');
    }
};



// update admin profile registration
if (isset($_POST['updatebtn'])) {
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];
    $usertype = $_POST['update_usertype'];

    $sql = "UPDATE `users` SET username='$username', email='$email', password='$password', usertype='$usertype' where id=$id";

    $result = mysqli_query($connect, $sql);

    if ($result) {
        $_SESSION['status'] = "Your data is updated successfully";
        $_SESSION['status_code'] = "success";
        header('location: register.php');
    } else {
        $_SESSION['status'] = 'Your data is not updated';
        $_SESSION['status_code'] = "error";
        header('location: regiyster.php');
    }
}


// delete admin profile
if (isset($_POST["delete_btn"])) {
    $id = $_POST["delete_id"];

    $sql = "DELETE FROM `users` WHERE id = $id";
    $result = mysqli_query($connect, $sql);

    if ($result) {
        // $_SESSION['success'] = "Your data is Deleted successfully";
        $_SESSION['status'] = "Your data is Deleted successfully";
        $_SESSION['status_code'] = "success";
        header('location: register.php');
    } else {
        // $_SESSION['status'] = 'Your data is not Deleted';
        $_SESSION['status'] = "Your data is not Deleted";
        $_SESSION['status_code'] = "error";
        header('location: index.php');
    }
}

// Add faculty member
if (isset($_POST['save_faculty'])) {
    $name = $_POST['faculty_Name'];
    $designation = $_POST['faculty_designation'];
    $description = $_POST['faculty_description'];
    $image = $_FILES["faculty_image"]["name"];

    // image validating
    // $validate_img_extension = $_FILES["faculty_image"]["type"] == "image/jpg" ||
    //     $_FILES["faculty_image"]["type"] == "image/png" ||
    //     $_FILES["faculty_image"]["type"] == "image/jpeg";

    $img_types = array('image/jpg', 'image/jpeg', 'image/png');
    $validate_img_extension = in_array($_FILES["faculty_image"]["type"], $img_types);

    if ($validate_img_extension) {
        if (file_exists("upload/" . $_FILES["faculty_image"]["name"])) {

            $stored = $_FILES["faculty_image"]["name"];
            // $_SESSION['status'] = "Faculty Image Already Exists. '$stored'";
            $_SESSION['status'] = "Faculty Image Already Exists. '$stored'";
            $_SESSION['status_code'] = "warning";
            header('location: faculty.php');
        } else {
            $sql = "INSERT INTO faculty(name, designation, description, image) VALUES ('$name', '$designation', '$description', '$image')";
            $result = mysqli_query($connect, $sql);

            if ($result) {
                move_uploaded_file($_FILES["faculty_image"]["tmp_name"], "upload/" . $_FILES["faculty_image"]["name"]);

                // $_SESSION['success'] = "Faculty Added";
                $_SESSION['status'] = "Faculty Added";
                $_SESSION['status_code'] = "success";
                header('location: faculty.php');
            } else {
                // $_SESSION['success'] = 'Faculty is not Added';
                $_SESSION['status'] = "Faculty is not Added";
                $_SESSION['status_code'] = "error";
                header('location: faculty.php');
            }
        }
    } else {
        // $_SESSION['success'] = 'Only JPG, JPEG, PNG images are valid';
        $_SESSION['status'] = "Only JPG, JPEG, PNG images are valid";
        $_SESSION['status_code'] = "success";
        header('location: faculty.php');
    }
}


// faculty members updation
if (isset($_POST['faculty_update_btn'])) {

    $edit_id = $_POST['edit_id'];
    $edit_name = $_POST['edit_name'];
    $edit_designation = $_POST['edit_designation'];
    $edit_description = $_POST['edit_description'];
    $edit_faculty_image = $_FILES["faculty_image"]["name"];

    $img_types = array('image/jpg', 'image/jpeg', 'image/png');
    $validate_img_extension = in_array($_FILES["faculty_image"]["type"], $img_types);

    if ($validate_img_extension) {

        $faculty_sql = "SELECT * FROM `faculty` WHERE id='$edit_id'";
        $faculty_result = mysqli_query($connect, $faculty_sql);

        foreach ($faculty_result as $faculty_row) {

            if ($edit_faculty_image == null) {

                // update with existing image
                $image_data = $faculty_row['image'];
            } else {
                // update with new image and delete old image
                if ($img_path = "upload/" . $faculty_row['image']) {
                    unlink($img_path);
                    $image_data = $edit_faculty_image;
                }
            }
        }

        $sql = "UPDATE `faculty` SET name='$edit_name', designation='$edit_designation', description='$edit_description', image='$image_data' WHERE id='$edit_id'";
        $result = mysqli_query($connect, $sql);

        if ($result) {
            if ($edit_faculty_image == null) {

                // update with existing image
                // $_SESSION['success'] = "Faculty Member Updated with existing image";
                $_SESSION['status'] = "Faculty Member Updated with existing image";
                $_SESSION['status_code'] = "success";
                header('location: faculty.php');
            } else {
                // update with new image and delete old image
                move_uploaded_file($_FILES["faculty_image"]["tmp_name"], "upload/" . $_FILES["faculty_image"]["name"]);
                // $_SESSION['success'] = "Faculty Member Updated";
                $_SESSION['status'] = "Faculty Member Updated";
                $_SESSION['status_code'] = "success";
                header('location: faculty.php');
            }
        } else {
            // $_SESSION['success'] = 'Faculty is not Updated';
            $_SESSION['status'] = "Faculty is not Updated";
            $_SESSION['status_code'] = "error";
            header('location: faculty.php');
        }
    } else {
        // $_SESSION['success'] = 'Only JPG, JPEG, PNG images are valid. try update again';
        $_SESSION['status'] = "Only JPG, JPEG, PNG images are valid. try update again";
        $_SESSION['status_code'] = "error";
        header('location: faculty.php');
    }
}

// deleting faculty members from the list
if (isset($_POST["faculty_delete_btn"])) {

    $id = $_POST["delete_id"];

    $sql = "DELETE FROM `faculty` WHERE id = '$id'";
    $result = mysqli_query($connect, $sql);

    if ($result) {
        // $_SESSION['success'] = "Your faculty member is Deleted";
        $_SESSION['status'] = "Your faculty member is Deleted";
        $_SESSION['status_code'] = "success";
        header('location: faculty.php');
    } else {
        // $_SESSION['status'] = 'Your faculty member is not Deleted';
        $_SESSION['status'] = "Your faculty member is not Deleted";
        $_SESSION['status_code'] = "error";
        header('location: faculty.php');
    }
}
