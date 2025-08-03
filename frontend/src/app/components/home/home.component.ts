import { Component, AfterViewInit } from '@angular/core';
import { LanguageMap } from 'src/app/interfaces/language.interface';
import { ScrollTriggerMap } from 'src/app/interfaces/scrollTrigger.interface';
import { Scrolltrigger } from 'src/app/models/scrolltrigger.model';
import { LanguagesService } from 'src/app/services/languages.service';
import { LoadingService } from 'src/app/services/loading.service';
import { ita } from 'src/app/languages/ita';
import { gsap } from 'gsap';
import { ScrollTrigger } from "gsap/ScrollTrigger";

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss'],
})

export class HomeComponent implements AfterViewInit {
  public lang:LanguageMap = ita;
  public sectiones:any;
  private delay:boolean = true;

  constructor(
    private _languageService : LanguagesService,
    private _scrolltrigger : Scrolltrigger,
    private _loadingService : LoadingService
  ){

    this._languageService.getLanguage$.subscribe((value:LanguageMap)=>{
      this.lang = value;
    }) 
    this._scrolltrigger.scolltrigger$.subscribe((value:Array<ScrollTriggerMap>)=>{
      this.sectiones = value;
    })
    this._loadingService.delay$.subscribe((value:boolean)=>{
      this.delay = value;
    })
  }


  ngAfterViewInit(): void {
    this._loadingService.executeAnimation(this.delay, () => {
      this.animationSectiones();
    });
  }

  animationSectiones():void{
    gsap.registerPlugin(ScrollTrigger);

   let animate = (class_name:string, top:string):void => {
      for(let i=1; i<=this.sectiones.length; i++){

        const tl = gsap.timeline({
          scrollTrigger : {
              trigger : `.${class_name}_${i}`,
              start : `top ${top}`,    
              end : '100% 100%',                         
          }
         }); 
    
         gsap.defaults({ duration:0.8 });
    
         let left = -140;
         let right = 140;
  
         if(i%2 != 0){
          tl.from(`.${class_name}_${i}`,{ x:left , opacity:0 });
         }else{
          tl.from(`.${class_name}_${i}`,{ x:right , opacity:0 });
         }
      }
    }

    
    animate('element','80%');
    animate('elementResp','100%');
  }



}