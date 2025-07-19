<?php


return [

    'type' => [
        'required' => 'type mancante',
    ],
    'name' => [
        'required' => 'Nome obbligatorio',
    ],
    'order' => [
        'required' => 'Numero ordine obbligatorio',
    ], 
    'timeDuration' => [
        'required' => 'Durata obbligatoria',
    ],
    'format' => [
        'required' => 'Formato durata obbligatorio',
    ],
    'date' => [
        'required' => 'Data obbligatoria',
    ],
    'text' => [
        'required' => 'Testo :lang obbligatorio',
    ],
    'file' => [
        'required' => 'Immagine obbligatoria',
        'mime' => 'Formato file non valido',
    ]


];