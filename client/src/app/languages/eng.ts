
import { getTime } from "../services/getTime"

export const eng = {

    language : 'eng',

    error : "Web page not found",

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
        elements : {
            visit : "Visit the section",
            skill_text : "The skills I have acquired so far allow me to create a complete Full Stack project from scratch, giving me the flexibility to choose the best programming language for each situation.",
            project_text : "The projects I have created so far are listed in ascending order from the most recent to the oldest. In each project, I always look for a new theme that inspires and guides me.",
            aboutMe_text : "General information about me, from my past to how I decided to pursue a career as a Web Developer. Nothing too long, don't worry!",
            contact_text : "My contact details are also visible in the Curriculum, but if you don't want to waste time, don't hesitate and write to me now!",
        }
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

        visit : "Visit"
    },

    aboutMe : {
        presentacion : "Hi! I am Carlo, a Full Stack Web Developer always looking for new challenges that allow me to give users the experience they seek!!",
        developer : `I have been in the web development world for ${getTime.time()} years, a world that has fascinated and captivated me.`,
        old_work : "I was a soldier for 16 years, undertaking missions both in Italy and abroad, handling security duties and learning the value of teamwork even in high-pressure situations.",
        new_work : `Over time, I have always been passionate about IT, working on web projects until ${getTime.time()} years ago when I decided to make it my new full-time profession!!`,
        skills : "I attended the Click Academy course and then continued my studies with various courses on the Udemy platform combined with a lot of self-taught practice!",
        final : "I enjoy teamwork and achieving shared goals that help the team reach ever higher levels!!"
    },

    skills : {
        icon : "Icons of"
    }
}