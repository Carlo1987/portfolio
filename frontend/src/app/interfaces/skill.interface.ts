export interface SkillMap {
  id: number;
  type: number;
  name: string;
  image: string;
  order: number;
}

export interface SkillSectionMap {
  name: string;
  skills: SkillMap[];
}

export interface SkillsListMap {
  frontend: SkillSectionMap;
  backend: SkillSectionMap;
  database: SkillSectionMap;
  devops: SkillSectionMap;
}