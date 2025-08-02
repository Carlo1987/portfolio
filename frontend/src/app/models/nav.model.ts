
import { Injectable } from "@angular/core";
import { BehaviorSubject } from "rxjs";
import { LanguageMap } from "../interfaces/language.interface";
import { NavMap } from "../interfaces/nav.interface";
import { LanguagesService } from "../services/languages.service";



@Injectable({
    providedIn : 'root'
})

export class Nav {

    private nav_model = new BehaviorSubject<Array<NavMap>>([]);
    public nav$ = this.nav_model.asObservable();


    constructor(
        private _languageService : LanguagesService
    ){
        this._languageService.getLanguage$.subscribe((value:LanguageMap)=>{

            let language = value.nav;

            let nav = [
                {
                    route : "/skills",
                    link : language.skills
                },
                {
                    route : "/projects",
                    link : language.projects
                },
                {
                    route : "/aboutme",
                    link : language.aboutMe
                },
                {
                    route : "/contacts",
                    link : language.contacts
                }
            ];


            this.nav_model.next(nav);

        })
    }

} 