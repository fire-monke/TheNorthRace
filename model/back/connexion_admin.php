<?php
    $db = new PDO('mysql:host=localhost;dbname=bdOccasion; charset=utf8', 'LucasR', 'root');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "I am right here<br/>";
?>

<?php
    try {
        $db = new PDO('mysql:host=localhost;dbname=bdOccasion; charset=utf8', 'LucasR', 'root');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        exit();
    }
    echo "You are connected<br/>";
?>