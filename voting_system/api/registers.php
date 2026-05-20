<?php
include("connect.php");

$name = $_POST['name'] ?? '';
$mobile = $_POST['mobile'] ?? '';
$password = $_POST['password'] ?? '';
$cpassword = $_POST['cpassword'] ?? '';
$address = $_POST['address'] ?? '';
$role = $_POST['role'] ?? '';

$image = $_FILES['photo']['name'] ?? '';
$tmp_name = $_FILES['photo']['tmp_name'] ?? '';

echo"<pre>";
print_r($_POST);
print_r($_FILES);
echo"</pre>";

if ($password === $cpassword) {


    if (!empty($image)) {
        move_uploaded_file($tmp_name, "../uploads/$image");
    }

    $name = mysqli_real_escape_string($connect, $name);
    $mobile = mysqli_real_escape_string($connect, $mobile);
    $password = mysqli_real_escape_string($connect, $password); 
    $address = mysqli_real_escape_string($connect, $address);
    $role = mysqli_real_escape_string($connect, $role);
    $image = mysqli_real_escape_string($connect, $image);

    $query = "INSERT INTO user (name, mobile, address, password, photo, role, status, votes)
              VALUES ('$name', '$mobile', '$address', '$password', '$image', '$role', 0, 0)";

    $insert = mysqli_query($connect, $query);

    if ($insert) {
        echo '<script>
            alert("Registration successful");
            window.location.href = "../";
        </script>';
    } else {
        echo '<script>
            alert("Error saving data: ' . mysqli_error($connect) . '");
            window.location.href = "../routes/register.html";
        </script>';
    }

} else {
    echo '<script>
        alert("Passwords do not match");
        window.location.href = "../routes/register.html";
    </script>';
}


?>