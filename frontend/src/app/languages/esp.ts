import { langToApi } from "./langToApi";

export const esp = {

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
    
    projects : {
        project_holiday : {
            name : "SardegnaDream",
            description : "Proyecto que simula la gestión de reservas para casas vacacionales. Podrás registrarte como ADMINISTRADOR y tendrás la posibilidad de añadir, modificar o eliminar anuncios de casas para alquilar!"
        },
        project_social : {
            name : "Faceback",
            description : "Proyecto que simula una plataforma social con funciones de chat, solicitudes de amistad, perfiles privados o públicos y la posibilidad de compartir imágenes y videos con comentarios y likes!"
        },
        project_sold : {
            name : "Dichatleon",
            description : "Proyecto que simula una plataforma para la compra y venta de productos. Podrás registrarte como ADMINISTRADOR para añadir nuevos artículos o modificar los ya existentes!"
        },

        visit : "Visita"
    },

    aboutMe : langToApi.aboutMe,

    skills : {
        icon : "Iconas de"
    }


}