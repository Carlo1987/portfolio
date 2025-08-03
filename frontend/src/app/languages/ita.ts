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

    aboutMe : langToApi.aboutMe,

    skills : {
        icon : "Icone di"
    }
}


export const ita = new Language(ita_structure);