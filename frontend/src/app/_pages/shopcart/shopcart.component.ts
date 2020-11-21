import { Component, OnInit } from '@angular/core';
import { Observable } from 'rxjs';
import { StoreService } from 'src/app/_services/store.service';
import { GlobalConstants } from 'src/app/global-constants';
import { EventEmitterService } from 'src/app/_services/event-emitter.service';

@Component({
  selector: 'app-shopcart',
  templateUrl: './shopcart.component.html'
})
export class ShopcartComponent implements OnInit {

  constructor(
              private storeService: StoreService,
              private emitterService: EventEmitterService
              ) { }

  breadArray = [];
  pageTitle: string = '';

  Cart_Array  = [];
  Cart_Storage_Json:string;
  Final_Cart_Array  = [];
  total_price:number = 0.00;

  cart_array_observer: Observable<any>;

  server_url:string = GlobalConstants.serverUrl;
  thumb_path:string = GlobalConstants.Prd_Img_200_Path;

  ngOnInit(): void {
    this.pageTitle = 'Cart';

    //++++++++++++++++++++++++ GENERATE BREADCRUMB :: Start ++++++++++++++++++++++++//
    this.breadArray.push(
      {href_path: './', bread_text: 'Home', bread_class: ''},
      {href_path: './store', bread_text: 'Store', bread_class: ''},
      {href_path: './cart', bread_text:this.pageTitle, bread_class: 'active'},
      );
    //++++++++++++++++++++++++ GENERATE BREADCRUMB :: End ++++++++++++++++++++++++//

    this.Cart_Storage_Json = localStorage.getItem('Storage_Cart_Array');
    this.Cart_Array = JSON.parse( this.Cart_Storage_Json );

    //++++++++++++++++++++++++ GENERATE CART ARRAY :: Start ++++++++++++++++++++++++//
    this.regenerate_cart_data();
    //++++++++++++++++++++++++ GENERATE CART ARRAY :: End ++++++++++++++++++++++++//
  }

  remove_item_from_cart( itemId ){
    this.Cart_Array = this.Cart_Array.filter(function( obj ) {
      return obj.item_id !== itemId;
    });

    localStorage.setItem( 'Storage_Cart_Array', JSON.stringify( this.Cart_Array ) );

    //++++++++++++++++++++++++ GET TOTAL CART PRICE :: Start ++++++++++++++++++++++++//
    this.regenerate_cart_data();
    //++++++++++++++++++++++++ GET TOTAL CART PRICE :: End ++++++++++++++++++++++++//
  }

  increase_decrease_quantity( product_id, event_type ){
    this.Cart_Storage_Json = localStorage.getItem('Storage_Cart_Array');
    this.Cart_Array = JSON.parse( this.Cart_Storage_Json );
    
    this.Cart_Array.forEach(function (e) {
      if( e.item_id == product_id ){
        
        if( event_type == 'increase' ){
          e.total_items++;
        }
        else if( (event_type == 'decrease') && (e.total_items > 1) ){
          e.total_items--;
        }
      }
    });

    localStorage.setItem( 'Storage_Cart_Array', JSON.stringify( this.Cart_Array ) );

    //++++++++++++++++++++++++ GET TOTAL CART PRICE :: Start ++++++++++++++++++++++++//
    this.regenerate_cart_data();
    //++++++++++++++++++++++++ GET TOTAL CART PRICE :: End ++++++++++++++++++++++++//
  }

  update_quantity(event: any, product_id){
    var quantity  = event.target.value;
    
    this.Cart_Storage_Json = localStorage.getItem('Storage_Cart_Array');
    this.Cart_Array = JSON.parse( this.Cart_Storage_Json );
    
    this.Cart_Array.forEach(function (e) {
      if( e.item_id == product_id ){
        e.total_items = quantity;
      }
    });

    localStorage.setItem( 'Storage_Cart_Array', JSON.stringify( this.Cart_Array ) );

    //++++++++++++++++++++++++ GET TOTAL CART PRICE :: Start ++++++++++++++++++++++++//
    this.regenerate_cart_data();
    //++++++++++++++++++++++++ GET TOTAL CART PRICE :: End ++++++++++++++++++++++++//
  }


  regenerate_cart_data(){
    //++++++++++++++++++++++++ GENERATE CART ARRAY :: Start ++++++++++++++++++++++++//
    this.cart_array_observer  = this.storeService.generate_cart_products( this.Cart_Array );

    this.cart_array_observer.subscribe(cart_res => {
      if(typeof cart_res.cart_array !== 'undefined'){
        this.Final_Cart_Array = cart_res.cart_array;
      }
      else{
        this.Final_Cart_Array = [];
      }

      this.total_price = (typeof cart_res.total_price !== 'undefined') ? cart_res.total_price : 0;

      this.emitterService.sendCartData(this.total_price);
    });
    //++++++++++++++++++++++++ GENERATE CART ARRAY :: End ++++++++++++++++++++++++//
  }

}
