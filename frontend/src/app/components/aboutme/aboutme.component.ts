import { Component , AfterViewInit , OnDestroy } from '@angular/core';
import { LanguageMap } from 'src/app/interfaces/language.interface';
import { LanguagesService } from 'src/app/services/languages.service';
import { ita } from 'src/app/languages/ita';
import { DelayService } from 'src/app/services/delay.service';
import { gsap } from 'gsap';


@Component({
  selector: 'app-aboutme',
  templateUrl: './aboutme.component.html',
  styleUrls: ['./aboutme.component.scss'],
})
export class AboutmeComponent implements AfterViewInit , OnDestroy {
  public lang:LanguageMap = ita;
  public phrases:Array<string> = [];



  constructor(
    private _languageService : LanguagesService,
    private delayService: DelayService
  ){

        
    this._languageService.getLanguage$.subscribe((value:LanguageMap)=>{
      this.lang = value;
      let language = this.lang.aboutMe;

      this.phrases = [
        language.developer,
        language.old_work,
        language.new_work,
        language.final
      ];
    })
    
  }


  ngAfterViewInit(): void {

    this.delayService.executeWithDelay(() => {
      this.animationPhrases();
    });
  }



  ngOnDestroy(): void {
    this.delayService.removeLoading();
  }


  animationPhrases():void{
    let tl = gsap.timeline({                  
      repeat : 0,                        
    });


   tl.from('.aboutMe_0',{
    delay : 0.1,
    duration : 0.9,
    y:20,
    opacity : 0
   }); 

   for(let i= 1; i < this.phrases.length +1; i++){
    tl.from(`.aboutMe_${i}`, {
      duration : 0.9,
      y:20,
      opacity : 0
     },'-=0.6');
   }
  }



}

