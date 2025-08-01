import { Component } from '@angular/core';
import { LanguagesService } from 'src/app/services/languages.service';


@Component({
  selector: 'app-error',
  templateUrl: './error.component.html',
  styleUrls: ['./error.component.scss'],
})
export class ErrorComponent {
  public lang:any;


  constructor(
    private _languageService : LanguagesService
  ){
    this._languageService.getLanguage$.subscribe(value=>{
      this.lang = value;
    });
  }




}
