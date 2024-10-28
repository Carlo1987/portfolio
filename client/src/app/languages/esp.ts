import { getTime } from "../services/getTime"


export const esp = {

    language : 'esp',

    error : "No se encuentra la pagina",

    nav : {
        skills : "Abilidades",
        aboutMe : "Sobre mi",
        projects : "Proyectos",
        contacts : "Contactos"
    },

    home: {
        welcome1 : "Hola!",
        welcome2 : "soy Carlo,",
        message1 : "Full Stack Web Developer",
        message2 : "originario de la hermosa Cerdeña!",
        elements : {
            visit : "Visitar la seccion",
            skill_text : "Las skills que he logrado hasta ahora me permiten crear un entero proyecto Full Stack a partir de zero, dandome la posibilidad de elegir el linguaje de programacion que creo sea el mejor por la ocasion.",
            project_text : "Los proyectos que he creado hasta ahora en orden ascendente de más nuevo a más antiguo, en cada proyecto busco siempre un nuevo tema para inspirarme y guiarme.",
            aboutMe_text : "Informaciones generales sobre mi, a partir de mi pasado hasta como decidì conseguir la carrera de Web Developer. No es muy larga, no te preocupes!",
            contact_text : "Mis contactos son visibles tambien en el Curriculum, si pero no quieres perder tiempo no lo dudes y escribeme immediatamente!",
        }
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
            description : "Proyecto que simula la reserva en casas de vacaciones y donde TU SERAS ADMINISTRADOR y podras añadir, modificar o borrar nuevas casas!!"
        },
        project_social : {
            name : "Faceback",
            description : "Proyecto que simula un social con chat y solicitudes de amistad, perfiles privados o publicos, compartiendo imagenes y videos con comentarios y likes!!"
        },
        project_sold : {
            name : "Dichatleon",
            description : "Proyecto que simula la venta/compra de productos y donde TU SERAS ADMINISTRADOR y podras añadir nuevos productos o modificarlos!!"
        }
    },


    aboutMe : {
        presentacion : "Hola! Soy Carlo, Full Stack Web Developer siempre en busqueda de nuevos desafios que me permitan regalar a los usuarios la experiencia que van buscando!!",
        developer : `Llevo ${getTime.time()} años en el mundo del desarrollo web, un mundo que me ha conquistado y fascinado.`,
        old_work : "He sido militar por 16 años, haciendo misiones milatares dentro y fuera del territorio italiano, teniendo encargos de seguridad y aprendiendo el valor de trajar en equipo en situaciones estresantes.",
        new_work : `En todo el tiempo siempre estuve apasionado a la informatica haciendo projectos y trabojos web hasta que hace ${getTime.time()} años decidì canvertirlo en mi nuevo trabajo!!`,
        skills : "He realizado el curso de Click Accademy y cuando lo terminè continuè los estudios con varios cursos en la plataforma Udemy unida a mucha practica gracias a diferentes fuentes!",
        final : "Me gusta trabajar en equipo y realizar objetivos comunes que lleven el team a niveles siempre mas altos!!"
    },


    skills : {
        icon : "Iconas de"
    }


}