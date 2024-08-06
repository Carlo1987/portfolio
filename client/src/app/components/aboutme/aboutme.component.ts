import { Component  } from '@angular/core';
import { service } from 'src/app/services/service';

@Component({
  selector: 'app-aboutme',
  templateUrl: './aboutme.component.html',
  styleUrls: ['./aboutme.component.scss']
})
export class AboutmeComponent {
  public lang:any = service.setLanguage();

}

