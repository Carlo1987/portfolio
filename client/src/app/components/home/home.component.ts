import { Component, AfterViewInit , OnDestroy } from '@angular/core';
import { LanguagesService } from 'src/app/services/languages';
import { DelayService } from 'src/app/services/delay';
import { ScrolltriggerModel } from 'src/app/models/scrolltrigger';
import { gsap } from 'gsap';
import { ScrollTrigger } from "gsap/ScrollTrigger";


@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss'],
})
export class HomeComponent implements AfterViewInit , OnDestroy {
  public lang:any;
  public sectiones:any;



  constructor(
    private _languageService : LanguagesService,
    private _scrolltriggerModel : ScrolltriggerModel,
    private delayService: DelayService
  ){
    this._languageService.getLanguage$.subscribe(value=>{
      this.lang = value;
    })


    this._scrolltriggerModel.scolltrigger$.subscribe(value=>{
      this.sectiones = value;
    })

  }


  ngAfterViewInit(): void {
    this.delayService.executeWithDelay(()=>{
      this.animationSectiones()
    });
  }



  ngOnDestroy(): void {
    this.delayService.removeLoading();
  }




  animationSectiones():void{
    
    gsap.registerPlugin(ScrollTrigger);


   let animate = (class_name:string,start_value:string):void => {
      for(let i=1; i<=this.sectiones.length; i++){

        const tl = gsap.timeline({
          scrollTrigger : {
              trigger : `.${class_name}_${i}`,
              start : `${start_value} top`,
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

    
    animate('element','-600px');
    animate('elementResp','-750px');
  }



}