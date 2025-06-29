
import { Injectable } from '@angular/core';
import { global } from './global';

@Injectable({
  providedIn: 'root'
})
export class DelayService {

  executeWithDelay(callback: () => void) {

    let isLoading = sessionStorage.getItem('loading');
    
    if (isLoading) {
      setTimeout(() => {
        callback();
      }, global.timing_animation);
    
    } else {
      callback();
    }
  
  }



  removeLoading():void{
    sessionStorage.removeItem('loading');
  }

}
