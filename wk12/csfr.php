<?php
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';

    if ($username === "host" && $password === "pass") {
        $message = "Login successful";
    } else {
        $message = "Login failed";
    }
}
?>

<h1>Login</h1>
<form method="post">
    <label>Username:</label>
    <input type="text" name="username">
    <br/>
    <label>Password:</label>
    <input type="password" name="password">
    <br/>
    <input type="submit" value="Login">
</form>

<div id="splash">
    <?php echo $message; ?>
</div>
