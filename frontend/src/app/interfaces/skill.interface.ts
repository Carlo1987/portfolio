export interface SkillMap {
  id: number;
  type: number;
  name: string;
  image: string;
  order: number;
}

export interface SkillGroupMap {
  name: string;
  skills: SkillMap[];
}

export interface SkillsAllMap {
  frontend: SkillGroupMap;
  backend: SkillGroupMap;
  database: SkillGroupMap;
  devops: SkillGroupMap;
}