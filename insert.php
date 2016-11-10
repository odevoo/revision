<?php 
require 'inc/db.php';
$file = fopen('clients.csv', 'r');

if ($file !== false) {
    while (($data = fgetcsv($file, 4096, ";")) !==false) {
   if (addUser($data)) {
       echo "Client Ajouté";
   } else { echo "Oups";}
    }

fclose($file);
}



function addUser($data) {
    require 'inc/db.php';
    $req = $pdo->prepare('SELECT id FROM users WHERE email = ?');
    $req->execute([$data[5]]);
    $email = $req->fetch();

    if ($email) {

        return false;
    } else {
        $req = $pdo->prepare('INSERT INTO users SET name = ?, firstname = ?, pwd = ?, address = ?, zip = ?, city = ?, email= ?');
        $hash = password_hash($data[6], PASSWORD_DEFAULT);
         $req->execute([$data[0], $data[1], $hash, $data[2], $data[3], $data[4], $data[5]]);
         return true;
    }
}

 ?>