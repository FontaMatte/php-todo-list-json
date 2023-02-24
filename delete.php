<?php

    //aquisisco i dati in formato json da 'database.json'
    $toDoListString = file_get_contents('database.json'); 

    // converto i dati da formato json ad array associativo php
    $toDoList = json_decode($toDoListString, true);

    $taskIndex = $_POST['deleteTask'];

    echo $newArray = array_slice($toDoList,$taskIndex,1);

    // $response = [
    //     'success' => true,
    //     'message' => 'Ok',
    //     'code' => 200,
    //     'toDoList' => $newArray        
    // ];
    
    // converto i dati da array associativo php a formato json
    $newTaskEncoded = json_encode($newArray);

    // header('Content-Type : application/json');

    // stampo i dati in formato json per renderli disponibili al client
    echo json_encode($newTaskEncoded);
