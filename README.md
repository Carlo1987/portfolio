REQUISITI:
- Docker
- simulatore server SMTP (esempio Mailtrap)


-------------------- PROCEDURA PRIMO AVVIO  ---------------------------

1) Copiare il repository sul proprio PC:

    - git clone https://github.com/Carlo1987/portfolio.git

Verrà copiata la cartella portfolio contenente due cartelle:
    - frontend , che contiene il frontend Angular
    - backend , che contiene il backend Laravel

2) Creare file portfolio/backend/.env  e compilarlo seguendo come modello portfolio/backend/.env.example 

3) Creare file portfolio/frontend/env.ts  e compilarlo seguendo come modello portfolio/frontend/env.example.ts

4) Nel backend Laravel, fare le seguenti azioni:
    - cd portfolio/backend

    A) Aggiornare dipendenze  -->  composer update
    B) fare la build  --> npm run build
    C) fare migrazioni  -->  docker exec portfolio-backend php artisan migrate
    D) eseguire seeders  --> docker exec portfolio-backend php artisan db:seed
    E) creare una cartella public/images/curriculum e al suo interno inserire 3 immagini così nominate:
        - firma.png            #  firma personale del curriculum
        - miei_dati.png        #  proprio Nome del curriculum
        - primo_piano.png      #  immagine del proprio primo piano

5) Nel frontend Angular, aggiornare le dipendenze:
    - cd portfolio/frontend
    - npm update

6) Creare immagini e container Docker e avviarli tramite il comando:

    - docker compose up -d

7) Applicazione accessibile alle relative rotte:
    - froontent --> http://localhost:4200
    - backend --> http://localhost:8080
    - phpMyAdmin --> http://localhost:8081



