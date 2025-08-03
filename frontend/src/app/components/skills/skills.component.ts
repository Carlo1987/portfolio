import { Component } from '@angular/core';
import { SkillsListMap, SkillSectionMap } from 'src/app/interfaces/skill.interface';
import { LanguageMap } from 'src/app/interfaces/language.interface';
import { SkillsList, SkillSection } from 'src/app/models/skill.model';
import { LanguagesService } from 'src/app/services/languages.service';
import { SkillService } from 'src/app/services/skill.service';
import { LoadingService } from 'src/app/services/loading.service';
import { ita } from 'src/app/languages/ita';
import { gsap } from 'gsap';


@Component({
  selector: 'app-skills',
  templateUrl: './skills.component.html',
  styleUrls: ['./skills.component.scss'],
})
export class SkillsComponent{
  private skillSection:SkillSectionMap = new SkillSection('',[]);
  public skills:SkillsListMap = new SkillsList(this.skillSection, this.skillSection, this.skillSection, this.skillSection); 
  public language:LanguageMap = ita;
  private delay:boolean = true;

  constructor(
    private _languageService : LanguagesService,
    private _skillService : SkillService,
    private _loadingService : LoadingService
  ){
    this._languageService.getLanguage$.subscribe((value:LanguageMap)=>{
      this.language = value;
    })
    this._skillService.getSkills$.subscribe((value:SkillsListMap)=>{
      this.skills = value;
    })
    this._loadingService.delay$.subscribe((value:boolean)=>{
      this.delay = value;
    })
  }


  ngAfterViewInit(): void {
    this._loadingService.executeAnimation(
      this.delay, 
      () => { this.animationSectiones(); },
      4300
      );
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

