<?php
function validateUsername($username)
{
    if (strlen($username) < 8) {
        return false;
    }
    return true;
}

function validateEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    return true;
}

function validateDateOfBirth($dob)
{
    $date = DateTime::createFromFormat('Y-m-d', $dob);
    if (!$date || $date->format('Y-m-d') !== $dob) {
        return false;
    }
    return true;
}

function validatePhone($phone)
{
    $phone = preg_replace('/[^0-9]/', '', $phone);
    if (strlen($phone) !== 10) {
        return false;
    }
    return true;
}

function registerUser($username, $email, $dob, $phone)
{
    if (!validateUsername($username)) {
        return 'Invalid username. It should have a minimum of 8 characters.';
    }
    if (!validateEmail($email)) {
        return 'Invalid email address.';
    }
    if (!validateDateOfBirth($dob)) {
        return 'Invalid date of birth.';
    }
    if (!validatePhone($phone)) {
        return 'Invalid phone number. It should have a length of 10 digits.';
    }

    return 'User registered successfully!';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];

    $result = registerUser($username, $email, $dob, $phone);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <h2>User Registration</h2>
    <?php if (isset($result)) { ?>
        <p><?php echo $result; ?></p>
    <?php } ?>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="username">Username (minimum 8 characters):</label><br>
        <input type="text" id="username" name="username" required minlength="8" value="<?php echo isset(
            $username
        )
            ? $username
            : ''; ?>"><br><br>

        <label for="email">Email Address:</label><br>
        <input type="email" id="email" name="email" required value="<?php echo isset(
            $email
        )
            ? $email
            : ''; ?>"><br><br>

        <label for="dob">Date of Birth (YYYY-MM-DD):</label><br>
        <input type="text" id="dob" name="dob" required pattern="\d{4}-\d{2}-\d{2}" value="<?php echo isset(
            $dob
        )
            ? $dob
            : ''; ?>"><br><br>

        <label for="phone">Phone Number (10 digits):</label><br>
        <input type="text" id="phone" name="phone" required pattern="\d{10}" value="<?php echo isset(
            $phone
        )
            ? $phone
            : ''; ?>"><br><br>

        <input type="submit" value="Register">
    </form>
</body>
</html>
