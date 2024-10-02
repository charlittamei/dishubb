<?php
session_start();
session_destroy(); 
header('Location: jadwal_bus.php'); 
exit;
?>s