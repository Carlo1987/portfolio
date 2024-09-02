import { Component } from '@angular/core';
import { service } from 'src/app/services/service';

@Component({
  selector: 'app-aboutme',
  templateUrl: './aboutme.component.html',
  styleUrls: ['./aboutme.component.scss']
})
export class AboutmeComponent{
  public lang:any = service.setLanguage();
  public phrases:Array<string> = [];



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



}

