export interface LanguageNavMap {
    skills:string,
    aboutMe:string,
    projects:string,
    contacts:string,
}


export interface LanguageHomeMap {
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


export interface LanguageContactMap {
    email:string,
    object:string,
    message:string,
    button:string,
    empty_fields:string,
    error_email:string,
    success:string,
    failed:string,
}

export interface LanguageProjectsMap {
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

export interface LanguageAboutMeMap {
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

    nav:LanguageNavMap,
    home:LanguageHomeMap,
    contact:LanguageContactMap,
    projects : LanguageProjectsMap,
    aboutMe:LanguageAboutMeMap,
    skills : {
        icon:string,
    }     
} 