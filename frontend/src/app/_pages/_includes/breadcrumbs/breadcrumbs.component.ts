import { Component, Input, OnInit } from '@angular/core';

@Component({
  selector: 'app-breadcrumbs',
  templateUrl: './breadcrumbs.component.html'
})
export class BreadcrumbsComponent implements OnInit {

  @Input() breadTitle: string;
  @Input() breads = [];
  
  constructor() { }

  ngOnInit(): void {
  }

}
