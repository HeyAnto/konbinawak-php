<?php
session_start();
session_destroy();
header("Location: logged-out.php");
exit;
