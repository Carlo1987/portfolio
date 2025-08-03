import { Component } from '@angular/core'; 
import { finalize } from 'rxjs/operators';
import { HttpErrorResponse } from '@angular/common/http';
import { LanguageMap } from 'src/app/interfaces/language.interface';
import { LanguagesService } from 'src/app/services/languages.service';
import { Email } from 'src/app/models/email.model';
import { ContactService } from 'src/app/services/contact.service';
import { ita } from 'src/app/languages/ita';

@Component({
  selector: 'app-contact',
  templateUrl: './contact.component.html',
  styleUrls: ['./contact.component.scss'],
  providers: [ContactService ]
})

export class ContactComponent {
  public lang:LanguageMap = ita;
  public fields:Email = new Email("","","");
  public loading:boolean = false;
  public message_error:string = '';
  public message_success:string = '';

  constructor(
    private _contactService : ContactService,
    private _languageService : LanguagesService,
  ){
    this._languageService.getLanguage$.subscribe((value:LanguageMap)=>{
      this.lang = value;
    })
  }

  emailSended(){    
    this.message_error = '';
    this.message_success = '';
    this.loading = true;
    
      this._contactService.sendEmail(this.fields).pipe(
        finalize(() => this.loading = false)
      ).subscribe({
        next : () => {
          this.fields = new Email("","","");
          this.message_success = this.lang.contact.success; 
        },
        error : (error:HttpErrorResponse) => {
          if(error.status == 422){
            this.message_error = this.lang.contact.error_email;
          }else{
            this.message_error = this.lang.contact.failed;
          }
        }
      }) 
  }

}
