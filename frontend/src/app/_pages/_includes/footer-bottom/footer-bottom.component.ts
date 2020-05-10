import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-footer-bottom',
  templateUrl: './footer-bottom.component.html'
})
export class FooterBottomComponent implements OnInit {

  constructor() { }

  currentYear:number;

  ngOnInit(): void {
    this.currentYear = (new Date()).getFullYear();
  }

}
