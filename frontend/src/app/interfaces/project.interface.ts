
interface ProjectSkillMap{
    name: string;
    image: string;
}

export interface ProjectMap {
    name: string;
    url: string;
    image: string;
    description_ITA: string;
    description_ESP: string;
    description_ENG: string;
    skills:Array<ProjectSkillMap>
}