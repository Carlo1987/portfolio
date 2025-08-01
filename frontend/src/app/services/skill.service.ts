import { Injectable } from '@angular/core';   
import { BehaviorSubject } from "rxjs";                                                 
import { url_api } from '../../env';



@Injectable({
    providedIn : 'root'
})
export class SkillService{
    public url:string = url_api + '/skills-api';
    private skills = new BehaviorSubject<any>({});
    getSkills$ = this.skills.asObservable();



    async getSkillsApi(){
        const response = await fetch(this.url);
        const skills = await response.json();
        this.skills.next(skills);
    }


}