import { Component } from '@angular/core';
import { url_api } from 'src/env';


@Component({
  selector: 'app-links',
  templateUrl: './links.component.html',
  styleUrls: ['./links.component.scss']
})
export class LinksComponent{

  private url:string = url_api + '/curriculum';


  links(url:string):void{
    if(url == 'ita' || url == 'esp' || url == 'eng'){
       window.open(`${this.url}?language=${url}`);
    }else{
      window.open(url);
    }
  }


}
