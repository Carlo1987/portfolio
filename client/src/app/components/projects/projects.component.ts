import { Component, ViewChildren, QueryList, ElementRef , OnInit } from '@angular/core';
import { projects } from 'src/app/models/projects';
import { service } from 'src/app/services/service';

@Component({
  selector: 'app-projects',
  templateUrl: './projects.component.html',
  styleUrls: ['./projects.component.scss']
})
export class ProjectsComponent implements OnInit{
   public projects:Array<any> = projects;
   @ViewChildren ('project_ang') projects_hover!: QueryList<ElementRef<HTMLDivElement>>

 
   ngOnInit(): void {
   //  service.reloadPage();
   }



   urlProject(url:string){
       window.open(url);
   }






   transition(project:any, value:number):void{

    project.nativeElement.style.transform = `translateX(${value}px)`;
    project.nativeElement.style.transition = "all 2s";
  }





   projectHover(i:number, direction:string, event:string){ 

        let more = 40;
        let less = -40;
      
        this.projects_hover.forEach((project,index_project)=>{
      
          project.nativeElement.classList.remove('animate__animated');

         if(i == index_project){                                   //     hover elemento selezionato
          project.nativeElement.classList.add('project_hover');

          if(direction == "left"){
            if(event == "enter"){
              this.transition(project,more);
            }else{
              this.transition(project,less);
            }
     
          }else{
            if(event == "enter"){
              this.transition(project,less);
            }else{
              this.transition(project,more);
            }
          }

           } else{                                                 //     hover elementi non selezionati

              let verify_class = project.nativeElement.classList.contains('project_hover');

              if(direction == "left" && verify_class){         
                this.transition(project,more);         
              }else if(direction == "right"   && verify_class){ 
                this.transition(project,less);                
              }
              project.nativeElement.classList.remove('project_hover');
            }   
        })
  }



 
 

}
