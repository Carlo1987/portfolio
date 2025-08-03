import { Injectable } from '@angular/core';                                      
import { HttpClient, HttpHeaders } from '@angular/common/http';                 
import { Observable } from 'rxjs';  
import { url_api } from '../../env';



@Injectable()
export class ContactService{
    private urlContacts:string = url_api + '/contacts-api';
    private urlEmail:string = url_api + '/client-email';

    constructor(
        private req: HttpClient          
    ){}


    getContactsApi():Observable<any>{
        return this.req.get(this.urlContacts);
    }


    sendEmail(data:any):Observable<any>{
        let params = JSON.stringify(data); 
        let headers = new HttpHeaders().set('Content-Type','application/json');
        return this.req.post(this.urlEmail, params, {headers:headers});
    }


}