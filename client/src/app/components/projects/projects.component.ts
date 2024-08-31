import { Component, ViewChildren, QueryList, ElementRef } from '@angular/core';
import { projects } from 'src/app/models/projects';


@Component({
  selector: 'app-projects',
  templateUrl: './projects.component.html',
  styleUrls: ['./projects.component.scss']
})
export class ProjectsComponent {
   public projects:Array<any> = projects;
   private value_positive:number = 110;
   private value_negative:number = -110;
   @ViewChildren ('project_ang') projects_hover!: QueryList<ElementRef<HTMLDivElement>>

 




   urlProject(url:string){
       window.open(url);
   }





   transition(project:any, value:number):void{
    project.nativeElement.style.transform = `translateX(${value}px)`;
    project.nativeElement.style.transition = "all 2s";
  }





  hoverCenter(i:number, direction:string){ 
     
        this.projects_hover.forEach((project,index_project)=>{
      
          project.nativeElement.classList.remove('animate__animated');

         if(i == index_project){   
            if(direction == 'left'){
              this.transition(project,this.value_positive);
            }else if(direction == 'right'){
              this.transition(project,this.value_negative);
            }                          
              
          } 

        })
  } 



  hoverSide(i:number){
    this.projects_hover.forEach((project,index_project)=>{

     if(i == index_project){   
          this.transition(project,0);    
      } 

    })
    
  }
  
 

}
