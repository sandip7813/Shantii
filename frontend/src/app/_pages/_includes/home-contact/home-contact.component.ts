import { Component, OnInit } from '@angular/core';
import { Validators, FormGroup, FormBuilder } from '@angular/forms';
import { ContactsService } from 'src/app/_services/contacts.service';

@Component({
  selector: 'app-home-contact',
  templateUrl: './home-contact.component.html'
})
export class HomeContactComponent implements OnInit {

  contactForm: FormGroup;
  submitted = false;

  constructor(
    private fb: FormBuilder,
    private contactService: ContactsService
  ) { }

  submitSuccess: boolean = false;
  btnLoader: boolean = false;

  ngOnInit(): void {
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
