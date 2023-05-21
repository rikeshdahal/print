<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    echo 'Now your are in a logged in session';
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username === 'admin' && $password === 'password') {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;

            if (!empty($_POST['remember'])) {
                setcookie('remember_user', $username, time() + 86400 * 30, '/');
            }

            echo 'Now your are in a logged in session';
            exit();
        } else {
            $error = 'Invalid username or password.';
        }
    } else {
        $error = 'Please enter both username and password.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
</head>
<body>
    <h2>Login Form</h2>
    <?php if (isset($error)) { ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="checkbox" id="remember" name="remember">
        <label for="remember">Remember me</label><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
