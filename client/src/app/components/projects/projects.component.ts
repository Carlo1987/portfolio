import { Component, DoCheck, AfterViewInit, ViewChildren, QueryList, ElementRef, SimpleChanges } from '@angular/core';
import { projects } from 'src/app/models/projects';


@Component({
  selector: 'app-projects',
  templateUrl: './projects.component.html',
  styleUrls: ['./projects.component.scss']
})
export class ProjectsComponent implements AfterViewInit, DoCheck{
   private big_screen:boolean = true; 
   public projects:Array<any> = projects;
   private value_positive:number = 110;
   private value_negative:number = -110;
   @ViewChildren ('project_ang') projects_hover!: QueryList<ElementRef<HTMLDivElement>>

 

   ngAfterViewInit(): void {
    setTimeout(()=>{
      this.projects_hover.forEach(project => {
        project.nativeElement.classList.remove('animate__animated');
      })
    },1000)
 
 
   }


  ngDoCheck(): void {
    this.responsive();
  }



   urlProject(url:string){
       window.open(url);
   }


   mqHandler(e:any) {
    if(e.matches){
      this.big_screen = true; 
      
    }else{
       this.big_screen = false; 
    }
}


   responsive(){
    const mqLarge = window.matchMedia( '(min-width: 992px)' );                                                   
     
   mqLarge.addEventListener('change', this.mqHandler);                       

   this.mqHandler(mqLarge);  
   }



   transition(project:any, value:number):void{
    project.nativeElement.style.transform = `translateX(${value}px)`;
    project.nativeElement.style.transition = "all 2s";
  }





  hoverCenter(i:number, direction:string){ 

    if(this.big_screen){

      this.projects_hover.forEach((project,index_project)=>{

        if(i == index_project){   
           if(direction == 'left'){
             this.transition(project,this.value_positive);
           }else if(direction == 'right'){
             this.transition(project,this.value_negative);
           }                          
             
         } 

       })

    }
     
  } 



  hoverSide(i:number){

    if(this.big_screen){

      this.projects_hover.forEach((project,index_project)=>{

        if(i == index_project){   
             this.transition(project,0);    
         } 
   
       })

    }
   
    
  }
  
 

}