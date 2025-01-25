<?php
session_start();
session_destroy();
echo '<script>alert("Admin Logout Success");window.location.assign("/MAKEEASY/index.html");</script>';
?>