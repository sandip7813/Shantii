import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-header-nav',
  templateUrl: './header-nav.component.html'
})
export class HeaderNavComponent implements OnInit {
  constructor() { }

  @Input() navData:string;
  navClass:string = '';

  ngOnInit(): void {
    if(this.navData == 'Home'){
      this.navClass = "page_header header_darkgrey header_transparent toggler_xs_right tall_header";
    }
    else{
      this.navClass = "page_header header_darkgrey background_cover toggler_xs_right tall_header";
    }
  }

}
