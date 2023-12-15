<?php
session_start();

// Détruire toutes les variables de session
session_unset();

// Détruire la session
session_destroy();

// Rediriger vers la page de connexion
<<<<<<< HEAD
header("Location: ../view/login.php");
=======
header("Location: ../../view/back/login.php");
>>>>>>> 99faa55c97139b839038561a3d3a37a319ece07f
exit;
?>
