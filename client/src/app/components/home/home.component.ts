import { Component, AfterViewInit, OnDestroy } from '@angular/core';
import { service } from 'src/app/services/service';
import { DelayService } from 'src/app/services/delay';
import { scrolltrigger } from 'src/app/models/scrolltrigger';
import { gsap } from 'gsap';
import { ScrollTrigger } from "gsap/ScrollTrigger";


@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements AfterViewInit, OnDestroy{
  public lang:any = service.setLanguage();
  public sectiones:any = scrolltrigger;



  constructor(
    private delayService: DelayService
  ){}


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


    function animate(class_name:string,start_value:string):void{
      for(let i=1; i<=scrolltrigger.length; i++){

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