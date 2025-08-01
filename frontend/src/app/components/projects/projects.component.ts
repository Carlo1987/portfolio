import { Component , OnDestroy } from '@angular/core';
import { ProjectModel } from 'src/app/models/projects.model';
import { DelayService } from 'src/app/services/delay.service';


@Component({
  selector: 'app-projects',
  templateUrl: './projects.component.html',
  styleUrls: ['./projects.component.scss']
})
export class ProjectsComponent implements  OnDestroy {
   public big_screen:boolean = true;
   public projects:Array<any> = [];
   public button:string = 'Visita';


   constructor(
    private _projectModel : ProjectModel,
    private delayService : DelayService
   ){

      this._projectModel.projects$.subscribe(values=>{
        this.projects = values.projects;
        this.button = values.button;        
      })

   }
 


  ngOnDestroy(): void {
    this.delayService.removeLoading();
  }



   urlProject(url:string){
       window.open(url);
   }

 

}
