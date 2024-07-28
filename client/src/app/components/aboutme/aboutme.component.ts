import { Component , OnInit } from '@angular/core';
import { service } from 'src/app/services/service';

@Component({
  selector: 'app-aboutme',
  templateUrl: './aboutme.component.html',
  styleUrls: ['./aboutme.component.scss']
})
export class AboutmeComponent implements OnInit{
  public lang:any = service.setLanguage();


  ngOnInit(): void {
   // service.reloadPage();
  }
}
