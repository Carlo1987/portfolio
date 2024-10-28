import { Component, AfterViewInit , ViewChildren, ElementRef, QueryList } from '@angular/core';
import { global } from 'src/app/services/global';
import { gsap } from "gsap";
import { ExpoScaleEase } from "gsap/EasePack";

@Component({
  selector: 'app-links',
  templateUrl: './links.component.html',
  styleUrls: ['./links.component.scss']
})
export class LinksComponent implements AfterViewInit{
  public icon:string = "none";
  private openCurriculum:boolean = false;
  private open_icon:boolean = true;
  private url:string = global.url_curriculum;
  @ViewChildren('link_words') link_words!: QueryList<ElementRef<HTMLDivElement>>; 
  

ngAfterViewInit(): void {
  this.responsivePadding();                                  
}



responsivePadding(){
  const mqLarge = window.matchMedia( '(min-width: 1200px)' );                                                   
   
 mqLarge.addEventListener('change', mqHandler);                         

 
  let links = this.link_words;

  function responsive(elements:any, value:string){
    elements.forEach((link_word:any)=>{
      link_word.nativeElement.style.paddingTop = value;
      link_word.nativeElement.style.paddingBottom = value;
    })  
  }

 function mqHandler(e:any) {
     if(e.matches){
         responsive(links,"0px");
     }else{
      responsive(links,"5px");
     }
 } 

 mqHandler(mqLarge);   
}



chooseCurriculum(){
  gsap.registerPlugin(ExpoScaleEase); 
  const duration = "0.5";

  let curriculum = (values:any , action:string) => {
    const tl = gsap.timeline({                 
      repeat : 0, 
      delay : 0,                        
    });


    if(action == "open"){

      this.open_icon = false;

      tl.to('.choose_curriculum',{                     
        display : values.display, 
        x : values.x,      
        y : values.y,  
        width : values.width,
        height : values.height, 
        opacity : values.opacity,     
        duration : duration                               
      });
  
      tl.to('.curriculum',{
        opacity : values.opacity
      });

    }else if(action == 'close'){

      this.open_icon = true;

      tl.to('.curriculum',{
        opacity : values.opacity
      });

      tl.to('.choose_curriculum',{                     
       display : values.display,  
        x : values.x,  
        y : values.y,  
        width : values.width,
        height : values.height, 
        opacity : values.opacity,
        duration : duration                                                     
      }, "-=0.4");
    }
  }



  let values = {
    x : "-55px", 
    y : "28px", 
    width : "140px",
    height : "auto", 
    display : "block",
    opacity : 1
  }

  if(!this.openCurriculum){
    curriculum(values , "open");
    this.openCurriculum = true;
  }else{
    values = {
      x : "0px",  
      y : "0px",  
      width : "0px",
      height : "0px", 
      display : "none",
      opacity : 0
    }
    curriculum(values , "close");
    this.openCurriculum = false;
  }
}



  links(url:string):void{
    if(url == 'ita' || url == 'esp'){
       window.location.href = `${this.url}?language=${url}`;
    }else{
      window.open(url);
    }
 
 
   
 }



 setIcon(icon:string){
  if(this.open_icon){
    this.icon = icon;  
  }
  
 }


 deleteIcon(){
  this.icon = 'none';   
 }



}
