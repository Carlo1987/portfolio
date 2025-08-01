export interface LanguageNav {
    skills:string,
    aboutMe:string,
    projects:string,
    contacts:string,
}


export interface LanguageHome {
    welcome1 : string,
    welcome2 : string,
    message1 : string,
    elements : {
        skill_text : string,
        project_text : string,
        aboutMe_text : string,
        contact_text : string
    }
}


export interface LanguageContact {
    email:string,
    object:string,
    message:string,
    button:string,
    empty_fields:string,
    error_email:string,
    success:string,
    failed:string,
}

export interface LanguageProjects {
    project_holiday : {
        name : string,
        description : string
    },
    project_social : {
        name : string,
        description : string
    },
    project_sold : {
        name : string,
        description : string
    }
}

export interface LanguageAboutMe {
    presentacion:string,
    developer:string,
    old_work:string,
    new_work:string,
    final:string,
}


export interface LanguageMap {
    language:string,
    error:string,
    visit:string,
    visitSection:string,

    nav:LanguageNav,

    home:LanguageHome,

    contact:LanguageContact,

    projects : LanguageProjects,
  
    aboutMe:LanguageAboutMe,

    skills : {
        icon:string,
    }

       
} 