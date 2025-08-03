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

4) Nel backend Laravel, fare la build:
    - cd portfolio/backend
    - npm run build

5) Sempre nel backend Laravel, aggiungere tre immagini nella cartella public/images/curriculum
    - firma.png
    - miei_dati.png
    - primo_piano.png

5) Creare immagini e container Docker e avviarli tramite il comando:

    - docker compose up -d

6) Applicazione accessibile alle relative rotte:
    - froontent --> http://localhost:4200
    - backend --> http://localhost:8080
    - phpMyAdmin --> http://localhost:8081


# Non dovrebbe essere necessario installare le dipendenze perchè vengono già installare tramite i relativi Dockerfile
# ... ma se dovesse servire:
4) Nel backend Laravel, le dipendenze si installano così :
    - cd portfolio/backend
    - composer install

5) Nel frontend Angular, le dipendenze si installano così :
    - cd portfolio/frontend
    - npm install

