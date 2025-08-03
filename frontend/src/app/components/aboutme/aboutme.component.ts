import { Component , AfterViewInit } from '@angular/core';
import { LanguageMap } from 'src/app/interfaces/language.interface';
import { LanguagesService } from 'src/app/services/languages.service';
import { ita } from 'src/app/languages/ita';
import { LoadingService } from 'src/app/services/loading.service';
import { gsap } from 'gsap';


@Component({
  selector: 'app-aboutme',
  templateUrl: './aboutme.component.html',
  styleUrls: ['./aboutme.component.scss'],
})
export class AboutmeComponent implements AfterViewInit {
  public lang:LanguageMap = ita;
  public phrases:Array<string> = [];
  private delay:boolean = true;


  constructor(
    private _languageService : LanguagesService,
    private _loadingService : LoadingService,
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

    this._loadingService.delay$.subscribe((value:boolean)=>{
      this.delay = value;
    }) 
  }

  ngAfterViewInit(): void {
    this._loadingService.executeAnimation(this.delay, () => {
      this.animationPhrases();
    });
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

