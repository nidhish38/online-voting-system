<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center">Voting System</h1>
        <hr>
        <div class="card shadow p-4">
            <h3 class="mb-4">Registration</h3>
            
            <form action="../api/registers.php" method="post" enctype="multipart/form-data"> 
                <div class="mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Enter name" required>
                </div>

                <div class="mb-3">
                    <input type="tel" class="form-control" name="mobile" placeholder="Enter mobile number" required pattern="[0-9]{10,15}">
                </div>

                <div class="mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                </div>

                <div class="mb-3">
                    <input type="password" class="form-control" name="cpassword" placeholder="Confirm password" required>
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control" name="address" placeholder="Address" required>
                </div>

                <div class="mb-3">
                    <input type="file" class="form-control" name="photo" required>
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Select Role</label>
                    <select name="role" class="form-select" required>
                        <option value="" disabled selected>Select your role</option>
                        <option value="1">Voter</option>
                        <option value="2">Group</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Register</button>
                <p class="mt-3">Already a user? <a href="../index.php">Login here</a></p>
            </form>
        </div>
    </div>
</body>
</html>