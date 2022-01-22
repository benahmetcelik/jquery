<?php


if ($_POST) {

    echo $_POST['dbName'];
    $newConnection = '<?php 
//Hello This is my first installer project for jquery

try {
    $db = new PDO("mysql:host=' . $_POST['hostname'] . ';dbname=' . $_POST['dbName'] . '", "' . $_POST['dbUsername'] . '", "' . $_POST['dbPass'] . '");
} catch ( PDOException $e ){
    print $e->getMessage();
}
?>';


    $statements = [
        '
CREATE TABLE `mytasks` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


'
    ];

    $file = fopen('connection.php', 'w');
    $result = fwrite($file, $newConnection);
    fclose($file);
    include 'connection.php';
    foreach ($statements as $statement) {
        $db->exec($statement);
    }
    $query = $db->prepare("INSERT INTO mytasks SET
    name = ?,
    status = ?");
    $insert = $query->execute(array(
        "First Tasks", 1
    ));
    $query = $db->prepare("INSERT INTO mytasks SET
    name = ?,
    status = ?");
    $insert = $query->execute(array(
        "Other Tasks", 0
    ));

unlink('install.php');
unlink('installer.php');
    echo 'Success';
}
?>