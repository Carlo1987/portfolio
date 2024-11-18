
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class DelayService {

  executeWithDelay(callback: () => void) {
    let isLoading = sessionStorage.getItem('loading');
    
    if (isLoading) {
      setTimeout(() => {
        callback();
      }, 4500);
    
    } else {
      callback();
    }
  }



  removeLoading():void{
    sessionStorage.removeItem('loading');
  }
}
