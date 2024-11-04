import { Component , AfterViewInit , OnDestroy} from '@angular/core';
import { skills } from 'src/app/models/skills';
import { service } from 'src/app/services/service';
import { DelayService } from 'src/app/services/delay';
import { gsap } from 'gsap';

@Component({
  selector: 'app-skills',
  templateUrl: './skills.component.html',
  styleUrls: ['./skills.component.scss']
})
export class SkillsComponent implements AfterViewInit, OnDestroy{
  public skills:any = skills;
  public language:any = service.setLanguage();



  constructor(
    private delayService: DelayService
  ){}


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
    delay : 0.1,
    duration : 0.8,
    y:30,
    opacity : 0
   });

   for(let i= 2; i<=6; i++){
    tl.from(`.section_${i}`, {
      duration : 0.8,
      y:30,
      opacity : 0
     },'-=0.6');
   }
  }


}

