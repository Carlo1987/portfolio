import { Component, OnInit, DoCheck , ViewChild,ElementRef  } from '@angular/core';
import { Router } from '@angular/router';
import { NavModel } from './models/nav';
import { LanguagesService } from './services/languages';
import { gsap } from 'gsap/gsap-core';



@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss'],
})

export class AppComponent implements OnInit , DoCheck {
  public lang:any; 
  public showLoading:boolean = true;  
  public nav:Array<any> = [];
  public menu_responsive:boolean = true;
  public menu_curriculum:boolean = false;
  @ViewChild('flag',{static:true}) flag!:ElementRef<HTMLImageElement>;


  constructor(
   private _router : Router,
   private _languageService : LanguagesService,
   private _navModel : NavModel
  ){
    this._languageService.getLanguage$.subscribe(value=>{
      this.lang = value;
    })


    this._navModel.nav$.subscribe(value=>{
      this.nav = value;
    })
  }


  ngOnInit(): void {

    if(!sessionStorage.getItem('change_language')){
      sessionStorage.setItem('loading','true');
      setTimeout(() => {
        this.showLoading = false;
      }, 4500);  
     
     }else{
      this.showLoading = false;
      sessionStorage.removeItem('change_language');
     }
  }


  ngDoCheck(): void {
    this.setFlag(); 
  }


   
 setFlag(){
  let flag = this.flag.nativeElement;
  const directory_flags = "../assets/images";
   
    if(this.lang.language == 'ita'){
      flag .setAttribute('src' , directory_flags+'/bandiera_italia.png');
   
    }else if(this.lang.language == 'esp'){
      flag .setAttribute('src' , directory_flags+'/bandiera_spagna.png');    
    
    }else if(this.lang.language == 'eng'){
      flag .setAttribute('src' , directory_flags+'/bandiera_inghilterra.png');    
    
    }
  }




   getLang(lang:string){
      this._languageService.setLanguage(lang);
   }


   closeMenuResponsive(value:string,late:string){
    let tl = gsap.timeline({
      repeat : 0
    })

    let translateX = 800;

    tl.to('.links_responsive',{
      opacity : 0,
      duration : 0.5
    }, '-=0.5');

    for(let i=this.nav.length-1; i>=0; i--){
      if(i == this.nav.length-1){
        animation_link_closed(late)
      }else{
        animation_link_closed(value)
      }


      function animation_link_closed(delay:string){
        tl.to( '.link_responsive_'+i, {
          duration : 0.7,
          x : translateX,
          onComplete: () => {
            const el = document.querySelector('.link_responsive_' + i) as HTMLElement;
            if (el) el.style.pointerEvents = 'none';
          }
        }, delay)
      }
  
    }

    tl.to('#nav_responsive', {
      height : 0,
      duration : 0.7,
      opacity : 0.2,
    }, value);

    tl.to('#closed_button',{ x:200 , rotate:0 , duration:1 },'-=0.7');
    tl.to('#close_button', { x:0 , duration : 1 }, '-=1');
   
    this.menu_responsive = true;
   }





   navigate(url:string){
    this.closeMenuResponsive('-=0.7','-=0.7');
    this._router.navigate([url]);  
   }



  

   menuResponsive(){
  
    if( this.menu_responsive){

      let tl = gsap.timeline({
        repeat : 0
      })

      tl.to('#close_button', { x:200 , duration : 1 });
      tl.to('#closed_button',{ x:0 , rotate:360 , duration:1 },'-=1');

      tl.to('#nav_responsive', {
        height : '90vh',
        duration : 0.7,
        opacity : 1
      }, '-=0.7');


      for(let i=0; i<this.nav.length; i++){
          tl.to( '.link_responsive_'+i, {
            duration : 0.5,
            x : 0,
            opacity : 1,
            onComplete: () => {
              const el = document.querySelector('.link_responsive_' + i) as HTMLElement;
              if (el) el.style.pointerEvents = 'auto';
            }
          }, '-=0.3')
      }

      tl.to('.links_responsive',{
        opacity : 1,
        duration : 0.8
      }, '-=0.1');

      this.menu_responsive = false;

    }else{
      this.closeMenuResponsive('-=0.5','-=0');
    }
  }

  
}
