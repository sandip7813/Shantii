import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-store',
  templateUrl: './store.component.html'
})
export class StoreComponent implements OnInit {

  constructor() { }

  breadArray = [];
  pageTitle: string = '';

  ngOnInit(): void {
    this.pageTitle = 'Store';
    
    this.breadArray.push(
      {href_path: '/', bread_text: 'Home', bread_class: ''},
      {href_path: '/store', bread_text:this.pageTitle, bread_class: 'active'},
      ); 

  }

}
