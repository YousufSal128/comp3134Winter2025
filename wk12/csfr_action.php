<?php
session_start();
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';
    $confirmation = $_POST["confirmation"] ?? '';
    $session_conf = $_SESSION["confirmation"] ?? '';

    if ($confirmation !== $session_conf) {
        $message = "❌ Invalid CSRF token!";
    } elseif ($username === "host" && $password === "pass") {
        $message = "Login successful with CSRF protection";
    } else {
        $message = "Login failed";
    }
}
?>

<h1>Login (CSRF Protected)</h1>
<form method="post">
    <label>Username:</label>
    <input type="text" name="username"><br/>
    <label>Password:</label>
    <input type="password" name="password"><br/>
    <input type="hidden" name="confirmation" value="<?php echo $_SESSION['confirmation'] ?? ''; ?>">
    <input type="submit" value="Login">
</form>

<div id="splash">
    <?php echo $message; ?>
</div>

