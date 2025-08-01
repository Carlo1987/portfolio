import { Injectable } from '@angular/core';                                      
import { HttpClient, HttpHeaders } from '@angular/common/http';                 
import { Observable } from 'rxjs';  
import { url_api } from '../../env';



@Injectable()
export class ContactService{
    public url:string = url_api + '/sendEmail';

    constructor(
        private req: HttpClient          
    ){}


    sendEmail(data:any):Observable<any>{
        let params = JSON.stringify(data); 
        let headers = new HttpHeaders().set('Content-Type','application/json');
        return this.req.post(this.url, params, {headers:headers});
    }


}