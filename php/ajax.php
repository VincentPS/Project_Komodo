<?php

    // makes the database connection
    try {
        $db = new PDO('mysql:host=localhost;dbname=komodo', 'root', '');
    } catch (PDOException $e) {
        print '<script>alert("Error!: ' . $e->getMessage() . '<br/>");</script>';
        die();
    }

    $table = $_GET['table'];
    $readQuery = $db->prepare('SELECT * FROM ' . $table);
    $readQuery->bindParam(':table', $table);
    $readQuery->execute();
    echo json_encode($readQuery->fetchAll());
