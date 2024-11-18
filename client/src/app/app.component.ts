import { Component, OnInit, AfterViewInit, ViewChild,ElementRef  } from '@angular/core';
import { Router } from '@angular/router';
import { ita } from './languages/ita';
import { esp } from './languages/esp';
import { service } from './services/service';
import { DelayService } from './services/delay';
import { nav } from './models/nav';
import { gsap } from 'gsap/gsap-core';



@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})

export class AppComponent implements OnInit, AfterViewInit{
  public lang:any = service.setLanguage();
  public showLoading:boolean = true;  
  public nav:Array<any> = nav;
  public menu_responsive:boolean = true;
  public menu_curriculum:boolean = false;
  @ViewChild('flag',{static:true}) flag!:ElementRef<HTMLImageElement>;

  constructor(
   private _router : Router,
   private _delayService : DelayService  
  ){}


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


  ngAfterViewInit(): void {
    this.setFlag(); 
  }


   
 setFlag(){
  let flag = this.flag.nativeElement;
  const directory_flags = "../assets/images";
   
    if(this.lang.language == 'ita'){
      flag .setAttribute('src' , directory_flags+'/bandiera_italia.png');
    }else if(this.lang.language == 'esp'){
      flag .setAttribute('src' , directory_flags+'/bandiera_spagna.png');    
    }  
  }




   getLang(lang:string){
     if(lang == 'ita'){
      this.lang = ita;
     }else if(lang == 'esp'){
      this.lang = esp;
     }
     sessionStorage.setItem('lang',JSON.stringify(this.lang));
     sessionStorage.setItem('change_language',"true");
     this._delayService.removeLoading();
     window.location.reload();
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
        tl.to( '.links_responsive_'+i, {
          duration : 0.7,
          x : translateX
        }, late)
      }else{
        tl.to( '.links_responsive_'+i, {
          duration : 0.7,
          x : translateX
        }, value)
      }
  
    }

    tl.to('#offcanvasNav', {
      width : 0,
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

      tl.to('#offcanvasNav', {
        width : '100%',
        height : 'auto',
        duration : 0.7,
        opacity : 1
      }, '-=0.7');

      tl.to('.links_responsive',{
        opacity : 1,
        duration : 0.7
      }, '-=0.5');

      for(let i=0; i<this.nav.length; i++){
          tl.to( '.links_responsive_'+i, {
            duration : 0.5,
            x : 0,
            opacity : 1
          }, '-=0.3')
      }

      this.menu_responsive = false;

    }else{
      this.closeMenuResponsive('-=0.5','-=0');
    }
   }










}
