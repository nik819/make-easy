<?php
session_start();
session_destroy();
echo '<script>alert("Logout Successfully..");window.location.assign("..//index.html");</script>';
?>