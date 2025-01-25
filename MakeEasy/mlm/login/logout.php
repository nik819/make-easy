<?php
	session_start();
	session_destroy();
	header("Location:login.php?reason=You are succesfully logouted");

?>