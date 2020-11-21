import { Component, OnInit } from '@angular/core';
import { Observable } from 'rxjs';
import { StoreService } from './_services/store.service';
import { EventEmitterService } from './_services/event-emitter.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'Welcome to the World of Shantii';

  Cart_Array  = [];
  Cart_Storage_Json:string;
  item_price:number = 0.00;

  cart_price_observer: Observable<any>;

  constructor(
              private storeService: StoreService,
              private emitterService: EventEmitterService
              ) { }

  ngOnInit(): void {
    this.Cart_Storage_Json = localStorage.getItem('Storage_Cart_Array');
    this.Cart_Array = JSON.parse( this.Cart_Storage_Json );

    //++++++++++++++++++++++++ GET TOTAL CART PRICE :: Start ++++++++++++++++++++++++//
    this.cart_price_observer  = this.storeService.generate_cart_products( this.Cart_Array );

    this.cart_price_observer.subscribe(price_res => {
      this.item_price = (typeof price_res.total_price !== 'undefined') ? price_res.total_price : 0;
    });
    //++++++++++++++++++++++++ GET TOTAL CART PRICE :: End ++++++++++++++++++++++++//

    this.emitterService.dataStr.subscribe(data => this.item_price = data);
  }
  

}
