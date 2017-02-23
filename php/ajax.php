<?php

    // makes the database connection
    try {
        $db = new PDO('mysql:host=localhost;dbname=komodo', 'root', '');
    } catch (PDOException $e) {
        print '<script>alert("Error!: ' . $e->getMessage() . '<br/>");</script>';
        die();
    }

    $table = filter_input(INPUT_POST, 'table');
    $readQuery = $db->prepare('SELECT * FROM :table');
    $readQuery->bindParam(':table', $table);
    $readQuery->execute();
    while ($readQuery->next()) {
        $result[] = $readQuery->value;
    }

    echo json_encode($result);
