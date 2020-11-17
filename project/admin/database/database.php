<?php
        $host = 'localhost';
        $user = 'root';
        $dbname = 'module2_casestudy';
        $password = 'tung2912';
        $dns = 'mysql:host='.$host.';dbname='.$dbname;
        $pdo = new PDO($dns, $user, $password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
?>