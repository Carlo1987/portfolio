// src/app/services/delay.service.ts

import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class DelayService {
  constructor() {}



  executeWithDelay(callback: () => void) {
    // Controlla se esiste il session storage "loading"
    const isLoading = sessionStorage.getItem('loading');
    
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
