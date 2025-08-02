
import { Injectable } from "@angular/core";
import { BehaviorSubject } from "rxjs";
import { url_api } from '../../env';
import { TextMap } from '../interfaces/text.interface';
import { LanguageMap } from '../interfaces/language.interface';
import { textHome, textAboutMe } from '../models/text.model';
import { ita } from "../languages/ita";
import { esp } from "../languages/esp";
import { eng } from "../languages/eng";



@Injectable({
    providedIn : 'root'
})
export class LanguagesService{
    private url:string = url_api + '/texts-api';
    private language = new BehaviorSubject<LanguageMap>(this.startingLanguage());

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


    setHomeText(texts:Array<TextMap>) :void{
        let home_ITA = new textHome('','','','');
        let home_ESP = new textHome('','','','');
        let home_ENG = new textHome('','','','');

        texts.forEach((text:TextMap) => {
            if(text.order == 4){
                home_ITA.skill_text = text.text_ITA;
                home_ESP.skill_text = text.text_ESP;
                home_ENG.skill_text = text.text_ENG;
            }
            if(text.order == 3){
                home_ITA.project_text = text.text_ITA;
                home_ESP.project_text = text.text_ESP;
                home_ENG.project_text = text.text_ENG;
            }
            if(text.order == 2){
                home_ITA.aboutMe_text = text.text_ITA;
                home_ESP.aboutMe_text = text.text_ESP;
                home_ENG.aboutMe_text = text.text_ENG;
            }
            if(text.order == 1){
                home_ITA.contact_text = text.text_ITA;
                home_ESP.contact_text = text.text_ESP;
                home_ENG.contact_text = text.text_ENG;
            }
        })
        ita.home.elements = home_ITA;
        esp.home.elements = home_ESP;
        eng.home.elements = home_ENG;
    }



    setAboutMeText(texts:Array<TextMap>) :void{
        
        let aboutMe_ITA = new textAboutMe('','','','','');
        let aboutMe_ESP = new textAboutMe('','','','','');
        let aboutMe_ENG = new textAboutMe('','','','','');

        texts.forEach((text:TextMap) => {
            if(text.order == 5){
                aboutMe_ITA.presentacion = text.text_ITA;
                aboutMe_ESP.presentacion = text.text_ESP;
                aboutMe_ENG.presentacion = text.text_ENG;
            }
            if(text.order == 4){
                aboutMe_ITA.developer = text.text_ITA;
                aboutMe_ESP.developer = text.text_ESP;
                aboutMe_ENG.developer = text.text_ENG;
            }
            if(text.order == 3){
                aboutMe_ITA.old_work = text.text_ITA;
                aboutMe_ESP.old_work = text.text_ESP;
                aboutMe_ENG.old_work = text.text_ENG;
            }
            if(text.order == 2){
                aboutMe_ITA.new_work = text.text_ITA;
                aboutMe_ESP.new_work = text.text_ESP;
                aboutMe_ENG.new_work = text.text_ENG;
            }
            if(text.order == 1){
                aboutMe_ITA.final = text.text_ITA;
                aboutMe_ESP.final = text.text_ESP;
                aboutMe_ENG.final = text.text_ENG;
            } 
        });
        ita.aboutMe = aboutMe_ITA;
        esp.aboutMe = aboutMe_ESP;
        eng.aboutMe = aboutMe_ENG;
    }

}

