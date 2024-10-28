
import { service } from "../services/service";

const coll = "../../assets/images/home";
const language = service.setLanguage().home.elements;
const link = service.setLanguage().nav;
const route = service.routes_nav;

export let scrolltrigger = [
    {
        image : coll+"/rubik.jpg",
        text : language.skill_text,
        link : "Skills",
        route : route.skills
    },
    {
        image : coll+"/progetti.jpg",
        text : language.project_text,
        link : link.projects,
        route : route.projects
    },
    {
        image : coll+"/pollice.jpg",
        text : language.aboutMe_text,
        link : link.aboutMe,
        route : route.aboutMe
    },
    {
        image : coll+"/telefono.jpg",
        text : language.contact_text,
        link : link.contacts,
        route : route.contacts
    }
];



