<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .alert-container {
            position: fixed;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1050;
            width: 100%;
            max-width: 600px;
            padding: 0 15px;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">

    <!-- Display Alert -->
    <div class="alert-container">
        <?php
        // Static users list
        $users = [
            ['type' => 'Admin', 'username' => 'admin', 'password' => 'Pass1234'],
            ['type' => 'Admin', 'username' => 'renmark', 'password' => 'Pogi1234'],
            ['type' => 'Content Manager', 'username' => 'pepito', 'password' => 'manaloto'],
            ['type' => 'Content Manager', 'username' => 'juan', 'password' => 'delacruz'],
            ['type' => 'System User', 'username' => 'pedro', 'password' => 'penduko']
        ];

        $alert = "";

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userType = $_POST['user_type'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            $isValid = false;

            // Validate user credentials
            foreach ($users as $user) {
                if ($user['type'] === $userType && $user['username'] === $username && $user['password'] === $password) {
                    $isValid = true;
                    break;
                }
            }

            // Display appropriate alert
            if ($isValid) {
                $alert = "
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                        Login Successful! You are logged in as <strong>$userType</strong>.
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
            } else {
                $alert = "
                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        Invalid Username/Password. Please try again.
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
            }
        }

        // Print the alert if set
        echo $alert;
        ?>
    </div>

    <!-- Login Form -->
    <div class="card p-4 shadow" style="width: 24rem;">
        <h3 class="text-center mb-4">Login</h3>
        <form method="POST">
            <div class="mb-3">
                <label for="user_type" class="form-label">User Type:</label>
                <select name="user_type" id="user_type" class="form-select" required>
                    <option value="Admin">Admin</option>
                    <option value="Content Manager">Content Manager</option>
                    <option value="System User">System User</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
