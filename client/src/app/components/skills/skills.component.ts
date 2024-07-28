import { Component , OnInit } from '@angular/core';
import { skills } from 'src/app/models/skills';
import { service } from 'src/app/services/service';

@Component({
  selector: 'app-skills',
  templateUrl: './skills.component.html',
  styleUrls: ['./skills.component.scss']
})
export class SkillsComponent implements OnInit {
  public skills:any = skills;


  ngOnInit(): void {
    // service.reloadPage();
  }
}
