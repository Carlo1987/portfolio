import { ita } from "../languages/ita";


export const service = {


    setLanguage : function(){
        let language = ita;
        if(sessionStorage.getItem('lang')){
          language = JSON.parse(sessionStorage.getItem('lang')!);
        }
        return language;
    },



    routes_nav : {
      skills : "/skills",
      projects : "/projects",
      aboutMe : "/aboutme",
      contacts : "/contacts"
    },



    reloadPage : function():void{
      if(sessionStorage.getItem('home')){
        sessionStorage.removeItem('home');
        location.reload();
      }
    },



    


}

