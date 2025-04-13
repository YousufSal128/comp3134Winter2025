<?php
session_start();
$_SESSION["confirmation"] = bin2hex(random_bytes(16)); // random token
?>

<h1>Secure CSRF Login Form</h1>

<form method="POST" action="csfr_action.php">
    <input type="hidden" name="username" value="host">
    <input type="hidden" name="password" value="pass">
    <input type="hidden" name="confirmation" value="<?php echo $_SESSION['confirmation']; ?>">
    <input type="submit" value="Auto Submit">
</form>

<script>
    document.forms[0].submit();
</script>

