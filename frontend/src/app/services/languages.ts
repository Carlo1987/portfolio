
import { Injectable } from "@angular/core";
import { BehaviorSubject } from "rxjs";
import { url_api } from '../../env';

import { ita } from "../languages/ita";
import { esp } from "../languages/esp";
import { eng } from "../languages/eng";

interface Text {
  id: number;
  order: number;
  type: number;
  text_ITA: string;
  text_ESP: string;
  text_ENG: string;
  created_at: string;
  updated_at: string;
}


@Injectable({
    providedIn : 'root'
})
export class LanguagesService{
    private url:string = url_api + '/texts-api';
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


    async getLanguagesApi() {
        const response = await fetch(this.url);
        const texts = await response.json();

        this.setHomeText(texts.home);
        this.setAboutMeText(texts.aboutMe);

        const lang = this.startingLanguage();
        this.language.next(lang);
    }


    setHomeText(texts:Array<Text>) :void{
       texts.forEach((text:Text) => {
            if(text.order == 4){
                ita.home.elements.skill_text = text.text_ITA;
                esp.home.elements.skill_text = text.text_ESP;
                eng.home.elements.skill_text = text.text_ENG;
            }
            if(text.order == 3){
                ita.home.elements.project_text = text.text_ITA;
                esp.home.elements.project_text = text.text_ESP;
                eng.home.elements.project_text = text.text_ENG;
            }
            if(text.order == 2){
                ita.home.elements.aboutMe_text = text.text_ITA;
                esp.home.elements.aboutMe_text = text.text_ESP;
                eng.home.elements.aboutMe_text = text.text_ENG;
            }
            if(text.order == 1){
                ita.home.elements.contact_text = text.text_ITA;
                esp.home.elements.contact_text = text.text_ESP;
                eng.home.elements.contact_text = text.text_ENG;
            }
        })
    }


    setAboutMeText(texts:Array<Text>) :void{
        texts.forEach((text:Text) => {
            if(text.order == 5){
                ita.aboutMe.presentacion = text.text_ITA;
                esp.aboutMe.presentacion = text.text_ESP;
                eng.aboutMe.presentacion = text.text_ENG;
            }
            if(text.order == 4){
                ita.aboutMe.developer = text.text_ITA;
                esp.aboutMe.developer = text.text_ESP;
                eng.aboutMe.developer = text.text_ENG;
            }
            if(text.order == 3){
                ita.aboutMe.old_work = text.text_ITA;
                esp.aboutMe.old_work = text.text_ESP;
                eng.aboutMe.old_work = text.text_ENG;
            }
            if(text.order == 2){
                ita.aboutMe.new_work = text.text_ITA;
                esp.aboutMe.new_work = text.text_ESP;
                eng.aboutMe.new_work = text.text_ENG;
            }
            if(text.order == 1){
                ita.aboutMe.final = text.text_ITA;
                esp.aboutMe.final = text.text_ESP;
                eng.aboutMe.final = text.text_ENG;
            }
        })
    }

}

