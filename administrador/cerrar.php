<?php
session_start();
session_destroy();
header('Location: index.php?mensaje=Sesión cerrada con éxito');
?>