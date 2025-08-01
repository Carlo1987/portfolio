
import { Injectable } from "@angular/core";
import { BehaviorSubject } from "rxjs";
import { LanguagesService } from "../services/languages.service";
//import { lang_progr } from "./devLanguages";
import { global } from "../services/global";


@Injectable({
    providedIn : 'root'
})

export class ProjectModel{

    private projects_model = new BehaviorSubject<any>({});
    public projects$ = this.projects_model.asObservable();


    constructor(
        private _languageService : LanguagesService
    ){

        this._languageService.getLanguage$.subscribe(value=>{

            const project = value.projects;
            const button = value.visit;
            const  coll = "../../assets/images/projects";
            const lang_progr = {
                name : '',
                image : '',
                language : ''
            }; 

           let projects = [
            /*     {
                    name : project.project_holiday.name,
                    description : project.project_holiday.description,
                    image :  coll + "/logo_sardegnaDream.jpg",
                    url : global.project_holiday,
                    languages : [
                        {
                            language :  lang_progr.Angular.language,
                            image :  lang_progr.Angular.image
                        },
                        {
                            language :  lang_progr.NodeJS.language,
                            image : lang_progr.NodeJS.image
                        },
                        {
                            language : lang_progr.MongoDB.language,
                            image :  lang_progr.MongoDB.image
                        },
                        {
                            language :  lang_progr.Typescript.language,
                            image : lang_progr.Typescript.image
                        },
                        {
                            language :  lang_progr.Bootstrap.language,
                            image :  lang_progr.Bootstrap.image,
                        },
                        {
                            language : lang_progr.Sass.language,
                            image :  lang_progr.Sass.image,
                        }
                    ]
                },
             */
                {
                    name : project.project_social.name,
                    description : project.project_social.description,
                    image :  coll + "/logo_faceback.jpg",
                    url : global.project_social,
                    languages : [
                        lang_progr,
   /*                      lang_progr.Php,
                        lang_progr.SocketIo,
                        lang_progr.NodeJS,
                        lang_progr.Mysql,
                        lang_progr.Bootstrap */
                    ]
                },
            
                {
                    name : project.project_sold.name,
                    description : project.project_sold.description,
                    image : coll + "/logo_dichatleon.webp",
                    url : global.project_shop,
                    languages : [
                        lang_progr,
                      /*   lang_progr.Mysql */
                    ]
                }, 
            
            ];

            
            this.projects_model.next({projects : projects , button : button });

        })
    }



} 


