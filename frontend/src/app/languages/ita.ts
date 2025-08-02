import { Language } from "../models/language.model";
import { langToApi } from "./langToApi";

const ita_structure = {

    language : 'ita',

    error : "Pagina web non trovata",

    visit : 'Visita',

    visitSection : "Visita la sezione",

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
        elements : langToApi.home
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
            description : "Progetto in cui viene simulata la gestione delle prenotazioni per case vacanze. Potrai registrarti come AMMINISTRATORE e avrai la possibilità di aggiungere, modificare o eliminare annunci di case da affittare!"
        },
        project_social : {
            name : "Faceback",
            description : "Progetto che simula una piattaforma social con funzionalità di chat, richieste di amicizia, profili privati o pubblici e la possibilità di condividere immagini e video accompagnati da commenti e like!"
        },
        project_sold : {
            name : "Dichatleon",
            description : "Progetto che simula una piattaforma per la vendita e l'acquisto di prodotti. Potrai registrarti come AMMINISTRATORE per aggiungere nuovi articoli o modificare quelli esistenti!"
        },
    },

    aboutMe : langToApi.aboutMe,

    skills : {
        icon : "Icone di"
    }
}


export const ita = new Language(ita_structure);