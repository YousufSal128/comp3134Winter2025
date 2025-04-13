<?php
// Read and directly output contents of storedxss.txt — UNSAFE
echo file_get_contents("storedxss.txt");
?>
