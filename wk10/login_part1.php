<?php
$common_passwords = [
    "123456", "123456789", "qwerty", "password", "1234567",
    "12345678", "12345", "iloveyou", "111111", "123123"
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = $_POST["password"] ?? "";
    if (in_array($input, $common_passwords)) {
        echo "<h2>Successfully authenticated</h2>";
        exit;
    }
}
?>

<h1>Weak Password</h1>
<form method="post">
    <label>Password</label>
    <input type="password" name="password">
    <br/>
    <input type="submit">
</form>
