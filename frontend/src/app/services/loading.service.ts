
import { Injectable } from '@angular/core';
import { BehaviorSubject } from "rxjs";
import { animation_delay } from 'src/env';

@Injectable({
  providedIn: 'root'
})
export class LoadingService {

  private delay = new BehaviorSubject<boolean>(true);
  public delay$ = this.delay.asObservable();
    

  setDelay(value:boolean){
    this.delay.next(value);
  }


  executeAnimation(
    delay:boolean, 
    animation:Function, 
    time:number|null = null
  ){
    if(!delay){
      animation();
    }else{
      const delayTime = time ?? animation_delay;
      setTimeout(() => {
        animation();
      },delayTime);
    }
  }
}
