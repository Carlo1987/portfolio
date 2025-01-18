
NOME DEL PROGETTO : Portfolio Full Stack Web Developer Loi Carlo

DESCRIZIONE : Questo è il mio portfolio



----  Quest'applicazione è stata volutamente salvata in modalità sviluppo su Github per permetterti di vedere il codice del frontend Angular  ----



-------------------- PROCEDURA PER COPIARE E USARE APPLICAZIONE SUL PC  ---------------------------

-----------   REQUISITI  -----------

Avere Docker installato
Avere un simulatore di server SMTP per posta ( per esempio Mailtrap )



-----------  PROCEDURA  ------------------


1) Copiare il repository sul proprio PC:

    git clone https://github.com/Carlo1987/portfolio.git


Verrà copiata la cartella portfolio contenente due cartelle:
     - client , che contiene il frontend Angular
     - server , che contiene il backend PHP


2) Andare dentro server e creare un file chiamato private.php


3) Dentro private.php copiare il codice seguente inserendo i tuoi dati nei punti contraddistinti da < >

--- private.php

<?php

$email = array(
    'host' => '<tuo_server_smtp_email>',
    'username' => '<identificativo_utente>',
    'password' => '<password_utente>',
    'port' => <numero_porta>
);



4) Avviare Docker, creare le immagini e container e avviarli tramite il comando:

       docker compose up -d



5) Aprire l'applicazione digitando nell'url:

          http://localhost:4200
