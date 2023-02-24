<?php

    //aquisisco i dati in formato json da 'database.json'
    $toDoListString = file_get_contents('database.json'); 
    // converto i dati da formato json ad array associativo php
    $toDoList = json_decode($toDoListString, true);

    // aggiungo il nuovo oggetto aquisito com metodo post all'array associativo
    $toDoList[] = [
        'toDo' => $_POST['newTask'],
        'done' => false
    ];

    // converto i dati da array associativo php a formato json
    $newTaskEncoded = json_encode($toDoList);

    // salvo i dati comleti di nuovo oggetto in database.json
    file_put_contents('database.json', $newTaskEncoded);

    // risposta che fornisco al client
    $response = [
        'success' => true,
        'message' => 'Ok',
        'code' => 200,
        'toDoList' => $toDoList        
    ];

    header('Content-type: aplication/json');

    // stampo i dati in formato json per renderli disponibili al client
    echo json_encode($response);