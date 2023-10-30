<?php
// Redirigir a la página de inicio de sesión (login.php en este ejemplo)
header("Location: ../src/components/login.php");
exit; // Asegura que el código posterior no se ejecute una vez redirigido
?>