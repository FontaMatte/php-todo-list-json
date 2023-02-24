<?php

    //aquisisco i dati in formato json da 'database.json'
    $toDoListString = file_get_contents('database.json'); 

    // converto i dati da formato json ad array associativo php
    $toDoList = json_decode($toDoListString, true);

    $arrayIndex = $_POST['index'];

    $toDoList[$arrayIndex] = [
        'toDo' => $_POST['updateTask']['toDo'],
        'done' => $_POST['updateTask']['done'] == 'true' ? true : false
    ];

    // converto i dati da array associativo php a formato json
    $TaskUpdateEncoded = json_encode($toDoList);

    // salvo i dati comleti di nuovo oggetto in database.json
    file_put_contents('database.json', $TaskUpdateEncoded);

    // risposta che fornisco al client
    $response = [
        'success' => true,
        'message' => 'Ok',
        'code' => 200,
        'toDoList' => $toDoList        
    ];

    header('Content-type: aplication/json');

    echo json_encode($response);