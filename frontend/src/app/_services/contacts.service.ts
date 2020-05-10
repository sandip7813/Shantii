import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import{ GlobalConstants } from '../global-constants';

@Injectable({
  providedIn: 'root'
})
export class ContactsService {
  server_url = GlobalConstants.serverUrl + 'api/';

  constructor(private http: HttpClient) { }

  contact_form_submit(contact_form_value){
    const contact_submit_url = this.server_url + 'user_contact';
    return this.http.post(contact_submit_url, contact_form_value)
  }
}
