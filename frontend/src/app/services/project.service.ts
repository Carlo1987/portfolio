import { Injectable } from '@angular/core';                                      
import { HttpClient } from '@angular/common/http';                 
import { Observable } from 'rxjs';  
import { url_api } from '../../env';



@Injectable()
export class ProjectService{
    private url:string = url_api + '/projects-api';

    constructor(
        private req: HttpClient          
    ){}


    getProjectsApi():Observable<any>{
        return this.req.get(this.url);
    }

}