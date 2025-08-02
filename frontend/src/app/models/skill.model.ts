import { SkillSectionMap, SkillMap } from 'src/app/interfaces/skill.interface';


export class Skill{
    constructor(
        public id : number,
        public type : number,
        public name : string,
        public image : string,
        public order : number
    ){}
}


export class SkillSection{
    constructor(
        public name : string,
        public skills : Array<SkillMap>
    ){}
}


export class SkillsList{
    constructor(
        public frontend : SkillSectionMap,
        public backend : SkillSectionMap,
        public database : SkillSectionMap,
        public devops : SkillSectionMap,
    ){}
}


