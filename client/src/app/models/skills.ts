
import { lang_progr } from "./languages";
import { service } from "../services/service";

const language = service.setLanguage().skills;

export const skills = {
    frontend : {
        title : "Frontend",
        languages : [
            {
                language : "Angular",
                image : lang_progr.Angular.image
            },
            {
                language : "Typescript",
                image : lang_progr.Typescript.image
            },
            {
                language : "Javascript",
                image :  lang_progr.Javascript.image
            },
            {
                language : "Bootstrap",
                image :  lang_progr.Bootstrap.image
            },
            {
                language : "Sass",
                image :  lang_progr.Sass.image
            },
            {
                language : "Css3",
                image :  lang_progr.Css.image
            },
            {
                language : "Html5",
                image :  lang_progr.Html.image
            },
        ]
    },

    backend : {
        title : "Backend",
        languages :   [
            {
                language : "NodeJS",
                image : lang_progr.NodeJS.image
            },
            {
                language : "Laravel",
                image :  lang_progr.Laravel.image
            },
            {
                language : "PHP",
                image :  lang_progr.Php.image
            },
        ]
    },

    
    database: {
        title : "Database",
        languages : [
            {
                language : "Mysql",
                image :  lang_progr.Mysql.image
            },
            {
                language : "MongoDB",
                image : lang_progr.MongoDB.image
            },
        ]
    },


    library : {
        title : language.library,
        languages : [
            {
                language : "Socket.io",
                image : lang_progr.SocketIo.image
            },
            {
                language : "Gsap",
                image : lang_progr.Gsap.image
            },
        ]
    },



    scada : {
        title : "SCADA",
        languages : [
            {
                language : "Git",
                image :  lang_progr.Git.image
            },
            {
                language : "GitHub",
                image : lang_progr.GitHub.image
            },
        ]
    },



    devops : {
        title : "DevOps",
        languages : [
            {
                language : "Gestione VPS",
                image : lang_progr.Vps.image
            }
        ]
            
        }
    

  
};