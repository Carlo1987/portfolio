import { Component, OnDestroy, ViewChildren, ElementRef, QueryList } from '@angular/core';
import { LanguageMap } from 'src/app/interfaces/language.interface';
import { ProjectMap } from 'src/app/interfaces/project.interface';
import { ProjectService } from 'src/app/services/project.service';
import { LanguagesService } from 'src/app/services/languages.service';
import { DelayService } from 'src/app/services/delay.service';
import { ita } from 'src/app/languages/ita';
import { url_public } from 'src/env';


@Component({
  selector: 'app-projects',
  templateUrl: './projects.component.html',
  styleUrls: ['./projects.component.scss'],
  providers:[ProjectService]
})
export class ProjectsComponent implements OnDestroy {
  public url:string = url_public;
   public lang:LanguageMap = ita;
   public projects:Array<ProjectMap> = [];
   @ViewChildren('descriptiones') descriptiones!: QueryList<ElementRef>;

   constructor(
    private _languagesService : LanguagesService,
    private _projectService : ProjectService,
    private delayService : DelayService
   ){
    this._languagesService.getLanguage$.subscribe((value:LanguageMap)=>{
      this.lang = value;
      this.setProjectLanguage(this.lang.language);
    })

    this._projectService.getProjectsApi().subscribe((values:Array<ProjectMap>)=>{
      this.projects = values;
    })
   }

  ngOnDestroy(): void {
    this.delayService.removeLoading();
  }


  setProjectLanguage(lang:string){
    this.descriptiones?.forEach((value:ElementRef) => {
      const description = value.nativeElement;
      if(description.classList.contains(lang) && description.classList.contains('hidden')){
        description.classList.remove('hidden');
      }else if(!description.classList.contains(lang) && !description.classList.contains('hidden')){
        description.classList.add('hidden');
      }
    })
  }

  visitProject(url:string){
    window.open(url);
  }

}
