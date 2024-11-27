<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light flex-column">

    <div class="container mt-3 w-100 d-flex justify-content-center">
        <?php
        $users = [
            ['type' => 'Admin', 'username' => 'admin', 'password' => 'Pass1234'],
            ['type' => 'Admin', 'username' => 'renmark', 'password' => 'Pogi1234'],
            ['type' => 'Content Manager', 'username' => 'pepito', 'password' => 'manaloto'],
            ['type' => 'Content Manager', 'username' => 'juan', 'password' => 'delacruz'],
            ['type' => 'System User', 'username' => 'pedro', 'password' => 'penduko']
        ];

        $alert = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userType = $_POST['user_type'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            $isValid = false;

            foreach ($users as $user) {
                if ($user['type'] === $userType && $user['username'] === $username && $user['password'] === $password) {
                    $isValid = true;
                    break;
                }
            }

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

        echo $alert;
        ?>
    </div>

    <div class="card p-4 shadow" style="width: 24rem;">
        <h3 class="text-center mb-4">Login</h3>
        <form method="POST">
            <div class="mb-3">
                <select name="user_type" id="user_type" class="form-select">
                    <option value="Admin">Admin</option>
                    <option value="Content Manager">Content Manager</option>
                    <option value="System User">System User</option>
                </select>
            </div>

            <div class="mb-3">
                <input type="text" name="username" id="username" placeholder="Username" class="form-control">
            </div>

            <div class="mb-3">
                <input type="password" name="password" id="password" placeholder="Password" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
