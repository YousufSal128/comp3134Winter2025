<form method="get">
    <input name="q" placeholder="Enter Text">
    <br/>
    <input type="submit" value="Go">
</form>

<?php
if (isset($_GET['q'])) {
    echo "<h3>Output:</h3>";
    echo $_GET['q']; // ❗ No sanitization — this is vulnerable
}
?>
