<?php

    //aquisisco i dati in formato json da 'database.json'
    $toDoListString = file_get_contents('database.json'); 

    // converto i dati da formato json ad array associativo php
    $toDoList = json_decode($toDoListString, true);

    $taskIndex = intval($_POST['deleteTask']);

    array_splice($toDoList,$taskIndex,1);

    // converto i dati da array associativo php a formato json
    $TaskDeleteEncoded = json_encode($toDoList);

    // salvo i dati comleti di nuovo oggetto in database.json
    file_put_contents('database.json', $TaskDeleteEncoded);

    $response = [
        'success' => true,
        'message' => 'Ok',
        'code' => 200,
        'toDoList' => $toDoList     
    ];
    

    // header('Content-Type : application/json');

    // stampo i dati in formato json per renderli disponibili al client
    echo json_encode($response);
