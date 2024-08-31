import { Component } from '@angular/core'; 
import { service } from 'src/app/services/service';
import { Email } from 'src/app/models/email';
import { ContactService } from 'src/app/services/contact';

@Component({
  selector: 'app-contact',
  templateUrl: './contact.component.html',
  styleUrls: ['./contact.component.scss'],
  providers: [ContactService]
})

export class ContactComponent{
  public lang:any = service.setLanguage();
  public fields:Email = new Email("","","");
  public loading:boolean = false;
  public message_error:string = '';
  public message_success:string = '';

  constructor(
    private _contactService : ContactService
  ){}


  emailSended(){    
    this.message_error = '';
    this.message_success = '';
    this.loading = true;

    const EMAIL_REGEX = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/

    if (this.fields.email.match(EMAIL_REGEX)){  
      
        this._contactService.sendEmail(this.fields).subscribe(response=>{
         if(response.status && response.message == 'send'){
          this.fields = new Email("","","");
          this.message_success = this.lang.contact.success; 
        }else{
          this.message_error = this.lang.contact.failed;
        }     
        this.loading = false;   
      })  
     
    }else{
      this.loading = false;
      this.message_error = this.lang.contact.error_email;
    }   
  }




}
