<?php

$config = require basePath('config/db.php');
$db = new Database($config);

$id = $_GET['id'] ?? '';

$params = [
    'id' => $id
];

// get the listing with the given id
$listing = $db->query('SELECT * FROM listings WHERE id = :id', $params)->fetch();


// load the view
loadView('listings/show', ['listing' => $listing]);
