import { getTime } from "../services/getTime"


export const ita = {

    language : 'ita',

    error : "Pagina web non trovata",

    nav : {
        skills : "Abilità",
        aboutMe : "Su di me",
        projects : "Progetti",
        contacts : "Contatti"
    },

    home: {
        welcome1 : "Ciao!",
        welcome2 : "sono Carlo,",
        message1 : "Full Stack Web Developer",
        elements : {
            visit : "Visita la sezione",
            skill_text : "Le skills che ho acquisito fino ad ora mi permettono di creare un intero progetto Full Stack da zero, dandomi la possibilità di scegliere quale linguaggio di programmazione sia meglio usare per l'occorrenza.",
            project_text : "I progetti che ho creato fino ad'ora in ordine crescente dal più recente al più vecchio, in ogni progetto cerco sempre un nuovo tema che mi ispiri e mi guidi.",
            aboutMe_text : "Informazioni generali su di me, dal mio passato fino a come ho deciso di percorrere la carriera di Sviluppatore Web. Niente di troppo lungo, non preoccuparti!",
            contact_text : "I miei contatti sono visibili anche nel Curriculum, ma se non vuoi perdere tempo allora non esitare e scrivimi subito!",
        }

        
    },

    contact : {
        email : "Digita la tua email",
        object : "Come ti chiami?",
        message : "Scrivi il tuo messaggio",
        button : "Invia messaggio",
        empty_fields : "Compila tutti i campi",
        error_email : "Inserire una email valida",
        success : "Email inviata!",
        failed : "Errore durante l'invio dell'email"
    },

    projects : {
        project_holiday : {
            name : "SardegnaDream",
            description : "Progetto dove viene simulata la prenotazione in case vacanze e dove TU SARAI UN AMMINISTRATORE e potrai provare ad aggiugere, modificare o cancellare nuove case da affittare!!"
        },
        project_social : {
            name : "Faceback",
            description : "Progetto dove viene simulato un social con chat e richieste di amicizia, profili privati o pubblici, condivisione di immagini e video con commenti e likes!!"
        },
        project_sold : {
            name : "Dichatleon",
            description : "Progetto dove viene simulata la vendita/acquisto di prodotti e dove TU SARAI AMMINISTRATORE e potrai provare ad aggiungere nuovi prodotti o a modificarne altri!!"
        }
    },


    aboutMe : {
        presentacion : "Ciao! Sono Carlo, Full Stack Web Developer sempre alla ricerca di nuove sfide che mi permettano di regalare agli utenti l'esperienza che cercano!!",
        developer : `Mi trovo nel mondo dello sviluppo web da ${getTime.time()} anni, un mondo che mi ha conquistato e rapito.`,
        old_work : "Sono stato militare per 16 anni, facendo missioni sia in territorio italiano che all'estero, ricoprendo incarichi di sicurezza e imparando il valore del lavoro di squadra anche in situazioni di forte pressione.",
        new_work : `Nel corso del tempo sono sempre stato appassionato all'informatica, facendo lavori e progetti web fino a quando ${getTime.time()} anni fa ho preso la decisione di farla diventare la mia nuova professione a tempo pieno!!`,
        skills : "Ho frequentato il corso di Click Accademy per poi proseguire gli studi con vari corsi sulla piattaforma Udemy unita a tanta pratica da autodidatta!",
        final : "Mi piace il lavoro di squadra e la realizzazione di obiettivi condivisi che portino il team a livelli sempre più alti!!"
    },



    skills : {
        icon : "Icone di"
    }

   
}