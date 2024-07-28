import { Injectable } from '@angular/core';                                      
import { HttpClient, HttpHeaders } from '@angular/common/http';                 
import { Observable } from 'rxjs';  
import { global } from './global';



@Injectable()
export class ContactService{
    public email:string = global.url_email;

    constructor(
        private _req: HttpClient          
    ){}



    sendEmail(data:any):Observable<any>{
        let params = JSON.stringify(data); 
        let headers = new HttpHeaders().set('Content-Type','application/json');
        return this._req.post(this.email, params, {headers:headers});
    }


}