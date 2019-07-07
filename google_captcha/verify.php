<?php
if (isset($_POST["captcha"])) {
session_start();
// Verifying user input captcha text with Google generated captcha.
if ($_SESSION["captcha"] == $_POST["captcha"]) {
echo "<b class=\"correct\">Correct Code Entered..!!</b>";
}else {
echo "<b class=\"wrong\">Wrong Code Entered..!!</b>";
}
unset($_SESSION['captcha']);
}
?>