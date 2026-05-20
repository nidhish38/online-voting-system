<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System - Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .login-box {
            max-width: 400px;
            width: 100%;
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="login-box">
            <h3 class="text-center mb-4">
                Voting system Login
            </h3>
            <form action="api/login.php" method="post">
                <div class="mb-3">
                <input type="text" name="mobile" class="form-control" placeholder="Mobile Number" required></div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Enter Password" required></div>
                    <div class="mb-3"> <select name="role" class="form-select" required>
                        <option value="">Select Role</option>
                        <option value="1">Voter</option>
                        <option value="2">Group</option>
                    </select>
                    </div>
                    <div class="d-grid"><button type="submit" class="btn btn-primary">Login</button></div>
                    <div class="text-center mt-3"><a href="routes/register.php">Register Here</a></div>
            </form>
        </div>
    </div>
</body>
</html>