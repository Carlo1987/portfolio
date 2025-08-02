import { Component } from '@angular/core';
import { LanguageMap } from 'src/app/interfaces/language.interface';
import { LanguagesService } from 'src/app/services/languages.service';
import { ita } from 'src/app/languages/ita';


@Component({
  selector: 'app-error',
  templateUrl: './error.component.html',
  styleUrls: ['./error.component.scss'],
})
export class ErrorComponent {
  public lang:LanguageMap = ita;


  constructor(
    private _languageService : LanguagesService
  ){
    this._languageService.getLanguage$.subscribe((value:LanguageMap)=>{
      this.lang = value;
    });
  }




}
