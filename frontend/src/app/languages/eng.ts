import { Language } from "../models/language.model";
import { langToApi } from "./langToApi";

const eng_structure = {

    language : 'eng',

    error : "Web page not found",

    visit : "Visit",

    visitSection : "Visit the section",

    nav : {
        skills : "Skills",
        aboutMe : "About Me",
        projects : "Projects",
        contacts : "Contacts"
    },

    home: {
        welcome1 : "Hi!",
        welcome2 : "I am Carlo,",
        message1 : "Full Stack Web Developer",
        elements : langToApi.home
    },

    contact : {
        email : "Enter your email",
        object : "What's your name?",
        message : "Write your message",
        button : "Send message",
        empty_fields : "Fill in all the fields",
        error_email : "Enter a valid email address",
        success : "Email sent!",
        failed : "Error while sending the email"
    },

    aboutMe : langToApi.aboutMe,

    skills : {
        icon : "Icons of"
    }
}


export const eng = new Language(eng_structure);