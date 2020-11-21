import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-header-top-cart',
  templateUrl: './header-top-cart.component.html'
})
export class HeaderTopCartComponent implements OnInit {

  @Input() TotalCartPrice:number;

  constructor() { }

  ngOnInit(): void { }

}
