import { 
  LanguageNavMap, 
  LanguageHomeMap, 
  LanguageContactMap, 
  LanguageAboutMeMap, 
  LanguageMap 
} from '../interfaces/language.interface';

export class Language implements LanguageMap {
  language!: string;
  error!: string;
  visit!: string;
  visitSection!: string;

  nav!: LanguageNavMap;
  home!: LanguageHomeMap;
  contact!: LanguageContactMap;
  aboutMe!: LanguageAboutMeMap;
  skills!: { icon: string };

  constructor(data: LanguageMap) {
    Object.assign(this, data);
  }
}

export class LanguageNav {
    constructor(
        public skills: string,
        public aboutMe: string,
        public projects: string,
        public contacts: string
    ) { }
}





