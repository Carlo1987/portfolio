
import { Injectable } from "@angular/core";
import { BehaviorSubject } from "rxjs";
import { LanguageMap } from "../interfaces/language.interface";
import { NavMap } from "../interfaces/nav.interface";
import { ScrollTriggerMap } from "../interfaces/scrollTrigger.interface";
import { Nav } from "./nav.model";
import { LanguagesService } from "../services/languages.service";

@Injectable({
    providedIn : 'root'
})


export class Scrolltrigger{

    private scroll_model = new BehaviorSubject<Array<ScrollTriggerMap>>([]);
    public scolltrigger$ = this.scroll_model.asObservable();


    constructor(
        private _languageService : LanguagesService,
        private _navModel : Nav
    ){

        this._navModel.nav$.subscribe((nav_value:Array<NavMap>)=>{
            let nav = nav_value;

            this._languageService.getLanguage$.subscribe((value:LanguageMap)=>{

                const coll = "../../assets/images/home";
                const language = value.home.elements;
                const link = value.nav;
    
                let scolltrigger = [
                    {
                        image : coll+"/rubik.jpg",
                        text : language.skill_text,
                        link : link.skills,
                        route : nav[0].route
                    },
                    {
                        image : coll+"/progetti.jpg",
                        text : language.project_text,
                        link : link.projects,
                        route : nav[1].route
                    },
                    {
                        image : coll+"/pollice.jpg",
                        text : language.aboutMe_text,
                        link : link.aboutMe,
                        route : nav[2].route
                    },
                    {
                        image : coll+"/telefono.jpg",
                        text : language.contact_text,
                        link : link.contacts,
                        route : nav[3].route
                    }
                ];


                this.scroll_model.next(scolltrigger);
    
            })
        })
  
    }


}







