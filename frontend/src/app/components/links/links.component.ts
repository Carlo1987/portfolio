import { Component } from '@angular/core';
import { global } from 'src/app/services/global';


@Component({
  selector: 'app-links',
  templateUrl: './links.component.html',
  styleUrls: ['./links.component.scss']
})
export class LinksComponent{

  private url:string = global.url_curriculum;




  links(url:string):void{
    if(url == 'ita' || url == 'esp' || url == 'eng'){
       window.open(`${this.url}?language=${url}`);
    }else{
      window.open(url);
    }
  }


}
