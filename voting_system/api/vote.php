<?php
session_start();
include('connect.php');

if (!isset($_SESSION['userdata'])) {
    header("location: ../");
    exit();
}

$votes = isset($_POST['gvotes']) ? (int)$_POST['gvotes'] : 0;
$total_votes = $votes + 1;
$gid = isset($_POST['gid']) ? (int)$_POST['gid'] : 0;
$uid = $_SESSION['userdata']['id'];

// Update votes for the selected group
$update_votes = mysqli_query($connect, "UPDATE user SET votes='$total_votes' WHERE id='$gid'");

// Update user status to "voted"
$update_user_status = mysqli_query($connect, "UPDATE user SET status=1 WHERE id='$uid'");

if ($update_votes && $update_user_status) {
    // Fetch updated group data
    $groups = mysqli_query($connect, "SELECT * FROM user WHERE role=2");
    $groupsdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);

    // Update session data
    $_SESSION['userdata']['status'] = 1;
    $_SESSION['groupsdata'] = $groupsdata;

    echo '
    <script>
        alert("Voting successful");
        window.location = "../routes/dashboard.php";
    </script>
    ';
} else {
    echo '
    <script>
        alert("Some error occurred!");
        window.location = "../routes/dashboard.php";
    </script>
    ';
}
?>