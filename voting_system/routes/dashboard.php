<?php
session_start();
if(!isset($_SESSION['userdata'])){
    header("location: ../");
    exit();
}

$userdata = $_SESSION['userdata'];
$groupsdata = $_SESSION['groupsdata'];

if($userdata['status'] == 0){
    $status = '<span class="badge bg-danger">Not Voted</span>';
} else {
    $status = '<span class="badge bg-success">Voted</span>';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">

    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">Voting System</h1>
        <div>
            <a href="../" class="btn btn-secondary btn-sm">Back</a>
            <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
        </div>
    </div>

    <!-- Profile Section -->
    <div class="card mb-4">
        <div class="card-body text-center">
            <img src="../uploads/<?php echo $userdata['photo'] ?>" class="rounded-circle mb-3" height="150" width="150">
            <h4><?php echo $userdata['name'] ?></h4>
            <p><b>Mobile:</b> <?php echo $userdata['mobile'] ?></p>
            <p><b>Address:</b> <?php echo $userdata['address'] ?></p>
            <p><b>Status:</b> <?php echo $status ?></p>
        </div>
    </div>

    <!-- Groups Section -->
    <div class="row">
        <?php
        if(!empty($groupsdata)){
            foreach($groupsdata as $group){
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <img src="../uploads/<?php echo $group['photo'] ?>" class="rounded mb-3" height="100" width="100">
                            <h5 class="card-title"><?php echo $group['name'] ?></h5>
                            <p><b>Votes:</b> <?php echo $group['votes'] ?></p>
                            <form action="../api/vote.php" method="POST">
                                <input type="hidden" name="gvotes" value="<?php echo $group['votes'] ?>">
                                <input type="hidden" name="gid" value="<?php echo $group['id'] ?>">
                                <?php if($userdata['status'] == 0){ ?>
                                    <button type="submit" name="votebtn" class="btn btn-primary btn-sm">Vote</button>
                                <?php } else { ?>
                                    <button disabled class="btn btn-success btn-sm">Voted</button>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>

</div>

</body>
</html>