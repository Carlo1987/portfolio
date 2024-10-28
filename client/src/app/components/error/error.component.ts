import { Component , OnInit } from '@angular/core';
import { service } from 'src/app/services/service';

@Component({
  selector: 'app-error',
  templateUrl: './error.component.html',
  styleUrls: ['./error.component.scss']
})
export class ErrorComponent implements OnInit{
  public lang:any = service.setLanguage();    

  ngOnInit(): void {
    service.reloadPage();
  }


}
