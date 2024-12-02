
import { Injectable } from "@angular/core";
import { BehaviorSubject } from "rxjs";
import { LanguagesService } from "../services/languages";



@Injectable({
    providedIn : 'root'
})

export class NavModel {

    private nav_model = new BehaviorSubject<Array<any>>([]);
    public nav$ = this.nav_model.asObservable();


    constructor(
        private _languageService : LanguagesService
    ){
        this._languageService.getLanguage$.subscribe(value=>{

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