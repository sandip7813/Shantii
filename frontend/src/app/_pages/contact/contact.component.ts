import { Component, OnInit } from '@angular/core';
import { Validators, FormGroup, FormBuilder } from '@angular/forms';
import { ContactsService } from 'src/app/_services/contacts.service';

@Component({
  selector: 'app-contact',
  templateUrl: './contact.component.html'
})
export class ContactComponent implements OnInit {

  contactForm: FormGroup;
  submitted = false;

  constructor(
    private fb: FormBuilder,
    private contactService: ContactsService
  ) { }

  breadArray = [];
  pageTitle: string = '';
  submitSuccess: boolean = false;
  btnLoader: boolean = false;

  ngOnInit(): void {
    this.pageTitle = 'Contact Me';
    
    //++++++++++++++++++++++++ GENERATE BREADCRUMB :: Start ++++++++++++++++++++++++//
    this.breadArray.push(
      {href_path: './', bread_text: 'Home', bread_class: ''},
      {href_path: './contact', bread_text:this.pageTitle, bread_class: 'active'},
      );
    //++++++++++++++++++++++++ GENERATE BREADCRUMB :: End ++++++++++++++++++++++++//
    
    //++++++++++++++++++++++++ CONTACT FORM VALIDATION :: Start ++++++++++++++++++++++++//
    this.contactForm = this.fb.group({
      full_name: ['', Validators.required],
      phone_number: [''],
      email: ['', [Validators.required, Validators.email]],
      subject: ['', Validators.required],
      message: ['', Validators.required],
    });
    //++++++++++++++++++++++++ CONTACT FORM VALIDATION :: End ++++++++++++++++++++++++//
  }

  get contactFormControl() {
    return this.contactForm.controls;
  }

  onContactFormSubmit() {
    this.submitted = true;
    this.btnLoader  = true;
    if (this.contactForm.valid) {
      this.contactService.contact_form_submit(this.contactForm.value).subscribe(res => {
        if( res ){
          this.submitted = false;
          this.submitSuccess  = true;
          this.contactForm.reset();
          this.btnLoader  = false;
        }
      });
    }
    else{
      this.btnLoader  = false;
    }
  }

}
