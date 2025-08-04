REQUISITI:
- Docker
- simulatore server SMTP (esempio Mailtrap)
- 3 immagini custom (nominativi nel punto 5E)


-------------------- PROCEDURA PRIMO AVVIO  ---------------------------

1) Copiare il repository sul proprio PC:

    - git clone https://github.com/Carlo1987/portfolio.git

Verrà copiata la cartella portfolio contenente il docker-compose.yml e due cartelle:
    - frontend , che contiene il frontend Angular
    - backend , che contiene il backend Laravel

2) Creare file portfolio/backend/.env  e compilarlo seguendo come modello portfolio/backend/.env.example 

3) Creare file portfolio/frontend/src/env.ts  e copiarla da portfolio/frontend/src/env.example.ts

4) Creare immagini e container Docker ed avviarli tramite il comando:

    - docker compose up -d


5) Nel backend Laravel, fare le seguenti azioni:
    - cd portfolio/backend

    A) Aggiornare dipendenze  -->  composer update
    B) fare la build  --> npm run build
    C) fare migrazioni  -->  docker exec portfolio-backend php artisan migrate
    D) eseguire seeders  --> docker exec portfolio-backend php artisan db:seed
    E) creare una cartella public/images/curriculum e al suo interno inserire 3 immagini così nominate:
        - firma.png            #  firma personale del curriculum
        - miei_dati.png        #  proprio Nome del curriculum
        - primo_piano.png      #  immagine del proprio primo piano

6) Nel frontend Angular, aggiornare le dipendenze:
    - cd portfolio/frontend
    - npm update

6-bis) SE NECESSARIO, riavviare i container  -->  docker compose up -d

7) Applicazione accessibile alle relative rotte:
    - frontend --> http://localhost:4200
    - backend --> http://localhost:8080
    - phpMyAdmin --> http://localhost:8081



