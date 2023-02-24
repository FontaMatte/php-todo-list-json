<?php

    //aquisisco i dati in formato json da 'database.json'
    $toDoListString = file_get_contents('database.json'); 

    // converto i dati da formato json ad array associativo php
    $toDoList = json_decode($toDoListString, true);

    $response = [
        'success' => true,
        'message' => 'Ok',
        'code' => 200,
        'toDoList' => $toDoList        
    ];

    // converto i dati da array associativo php a fotmato json
    $jsonToDoList = json_encode($response);

    header('Content-Type: application/json');

    echo $jsonToDoList;