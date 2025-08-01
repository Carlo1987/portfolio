import { Component } from '@angular/core';
import { SkillsAllMap } from 'src/app/interfaces/skill.interface';
import { LanguageMap } from 'src/app/interfaces/language.interface';
import { Language } from 'src/app/models/language.model';
import { Skill } from 'src/app/models/skill.model';
import { LanguagesService } from 'src/app/services/languages.service';
import { SkillService } from 'src/app/services/skill.service';
import { DelayService } from 'src/app/services/delay.service';
import { url_public } from 'src/env';
import { gsap } from 'gsap';


@Component({
  selector: 'app-skills',
  templateUrl: './skills.component.html',
  styleUrls: ['./skills.component.scss'],
})
export class SkillsComponent{
  public url:string = url_public;
  public skills:SkillsAllMap = Skill; 
  public language:LanguageMap = Language;


  constructor(
    private _languageService : LanguagesService,
    private _skillService : SkillService,
    private delayService : DelayService
  ){
    this._languageService.getLanguage$.subscribe(value=>{
      this.language = value;
    })
    this._skillService.getSkills$.subscribe(value=>{
      this.skills = value as SkillsAllMap;
    })
  }


  ngAfterViewInit(): void {
    this.delayService.executeWithDelay(() => {
      this.animationSectiones();
    });  
  } 


  ngOnDestroy(): void {
    this.delayService.removeLoading();
  }



  animationSectiones():void{
    let tl = gsap.timeline({                  
      repeat : 0,                        
    });


   tl.from('.section_1',{
    delay : 0.5,
    duration : 0.8,
    y:30,
    opacity : 0,
   });

   for(let i= 2; i<5; i++){
    tl.from(`.section_${i}`, {
      duration : 1,
      y:30,
      opacity : 0,
     },'-=0.6');
   }
  }

  

}

