import { Language } from "../models/language.model";
import { langToApi } from "./langToApi";

const esp_structure = {

    language : 'esp',

    error : "No se encuentra la pagina",

    visit : "Visita",

    visitSection : "Visitar la seccion",

    nav : {
        skills : "Habilidades",
        aboutMe : "Sobre mi",
        projects : "Proyectos",
        contacts : "Contactos"
    },

    home: {
        welcome1 : "Hola!",
        welcome2 : "soy Carlo,",
        message1 : "Full Stack Web Developer",
        elements : langToApi.home
    },

    contact : {
        email : "Inserta tu email",
        object : "Como te llamas?",
        message : "Escribe tu mensaje",
        button : "Enviar mensaje",
        empty_fields : "Compilar todos los campos",
        error_email : "Insertar un correo valido",
        success : "Mensaje enviado!",
        failed : "Error durante el envio del mensaje"
    },

    aboutMe : langToApi.aboutMe,

    skills : {
        icon : "Iconas de"
    }
}

export const esp = new Language(esp_structure);