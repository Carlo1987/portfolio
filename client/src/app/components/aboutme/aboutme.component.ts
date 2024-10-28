import { Component , AfterViewInit } from '@angular/core';
import { service } from 'src/app/services/service';
import { gsap } from 'gsap';

@Component({
  selector: 'app-aboutme',
  templateUrl: './aboutme.component.html',
  styleUrls: ['./aboutme.component.scss']
})
export class AboutmeComponent implements AfterViewInit {
  public lang:any = service.setLanguage();
  public phrases:Array<string> = [];


  ngAfterViewInit(): void {
    this.animationPhrases();
  }


  constructor(){
    const language = this.lang.aboutMe;

    this.phrases = [
      language.developer,
      language.old_work,
      language.new_work,
  /*     language.skills, */
      language.final
    ];
  
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

