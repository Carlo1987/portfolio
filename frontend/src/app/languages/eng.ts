
import { langToApi } from "./langToApi";

export const eng = {

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

    projects : {
        project_holiday : {
            name : "SardegnaDream",
            description : "A project simulating the management of vacation rental bookings. You can register as an ADMINISTRATOR and will have the ability to add, edit, or delete rental property listings!"
        },
        project_social : {
            name : "Faceback",
            description : "A project simulating a social platform with features like chat, friend requests, private or public profiles and the ability to share images and videos with comments and likes!"
        },
        project_sold : {
            name : "Dichatleon",
            description : "A project simulating a platform for buying and selling products. You can register as an ADMINISTRATOR to add new items or edit existing ones!"
        },
    },

    aboutMe : langToApi.aboutMe,

    skills : {
        icon : "Icons of"
    }
}