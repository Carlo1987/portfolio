import { Component, Input } from '@angular/core';
import { url_public } from 'src/env';
import { SkillSectionMap, SkillMap } from 'src/app/interfaces/skill.interface';
import { SkillSection, Skill } from 'src/app/models/skill.model';

@Component({
  selector: 'app-skill-section',
  templateUrl: './skill-section.component.html',
  styleUrls: ['./skill-section.component.scss'],
})
export class SkillSectionComponent  {
  public url:string = url_public;
  @Input() skillSection:SkillSectionMap = new SkillSection('',[]);

}
