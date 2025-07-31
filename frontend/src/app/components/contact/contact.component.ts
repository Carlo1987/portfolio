import { Component , OnDestroy } from '@angular/core'; 
import { finalize } from 'rxjs/operators';
import { HttpErrorResponse } from '@angular/common/http';
import { LanguagesService } from 'src/app/services/languages';
import { DelayService } from 'src/app/services/delay';
import { Email } from 'src/app/models/email';
import { ContactService } from 'src/app/services/contact';

@Component({
  selector: 'app-contact',
  templateUrl: './contact.component.html',
  styleUrls: ['./contact.component.scss'],
  providers: [ContactService ]
})

export class ContactComponent implements  OnDestroy {
  public lang:any;
  public fields:Email = new Email("","","");
  public loading:boolean = false;
  public message_error:string = '';
  public message_success:string = '';

  constructor(
    private _contactService : ContactService,
    private _languageService : LanguagesService,
    private delayService: DelayService
  ){
    this._languageService.getLanguage$.subscribe(value=>{
      this.lang = value;
    })
  }

  ngOnDestroy(): void {
    this.delayService.removeLoading();
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
