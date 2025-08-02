import { Component } from '@angular/core';
import { url_api } from 'src/env';
import { ContactService } from 'src/app/services/contact.service';

@Component({
  selector: 'app-links',
  templateUrl: './links.component.html',
  styleUrls: ['./links.component.scss'],
  providers: [ContactService ]
})
export class LinksComponent{

  public url_github:string = '';
  public url_linkedin:string = '';
  public url_curriculum:string = '';

  constructor(
    private _contactService:ContactService
  ){
    this._contactService.getContactsApi().subscribe((value:any)=>{
      this.url_github = value.github;
      this.url_linkedin = value.linkedin;
      this.url_curriculum = value.curriculum;
    })
  }


  links(url:string, lang:string|null = null):void{
    const URL = !lang  ?  url  : `${url}/${lang}`; 
    window.open(URL);
  }


}
