
import { Injectable } from "@angular/core";
import { BehaviorSubject } from "rxjs";

import { ita } from "../languages/ita";
import { esp } from "../languages/esp";
import { eng } from "../languages/eng";


@Injectable({
    providedIn : 'root'
})
export class LanguagesService{

    private language = new BehaviorSubject<any>(this.startingLanguage());


    getLanguage$ = this.language.asObservable();



    startingLanguage(){
        if(sessionStorage.getItem('lang')){
            return JSON.parse(sessionStorage.getItem('lang')!);
        }

        return ita
    }



    setLanguage(value:string){
        let lang = ita;
        if(value == 'ita'){
          lang = ita;
        
        }else if(value == 'esp'){
            lang = esp;
        
        }else if(value == 'eng'){
            lang = eng;
        }

        this.language.next(lang);
        sessionStorage.setItem('lang',JSON.stringify(lang));
    }


}

