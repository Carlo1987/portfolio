
import { service } from "../services/service";

const language = service.setLanguage().nav;
const route = service.routes_nav;

export const nav = [
  
    {
        route : route.skills,
        link : language.skills
    },
    {
        route : route.projects,
        link : language.projects
    },
    {
        route : route.aboutMe,
        link : language.aboutMe
    },
    {
        route : route.contacts,
        link : language.contacts
    }
];