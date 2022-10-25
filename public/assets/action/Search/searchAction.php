<?php


$host = 'localhost';
$port = 3306;
$dbName = 'project_laravel';
$user = 'root';
$pass = '';


$statusConn = false;
$message = "";


try {
    $connect = new PDO("mysql:host={$host};port={$port};dbname=" . $dbName, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    $statusConn = true;
} catch (Exception $ex) {

    die('Erro: Por favor tente novamente. Caso o problema persista, entre em contato o administrador.');
}

$pesquisa = $_POST['search'];
$action = $_POST['action'];

if ($statusConn && $action == 'search_event') {
    $sqlWhere = "AND title LIKE '%{$pesquisa}%'";
}

$query = "SELECT id, title, description, image, date FROM events WHERE 1 = 1 " . $sqlWhere . " ORDER BY title";

$stmt = $connect->prepare($query);
$exec = $stmt->execute();

if ($exec) {
    $status = true;
} else {
    $status = false;
}

$total = [];

$dados = [];

if ($exec) {

    $row = $stmt->fetchAll();

    foreach ($row as $column) {

        $total = array([

            'id' => $column['id'],

            'title' => $column['title'],

            'description' => $column['description'],

            'image' => $column['image'],

            'date' => $column['date']

        ]);

        $dados = array_merge($dados, $total);
    }

    $status = true;
} else {

    $status = false;
}

$retorno = [
    'status' => $status,
    'dados' => $dados
];

switch ($action) {
    case 'search_event':
        echo json_encode($retorno);
        break;
    default:
        break;
}
