import { Component, OnInit, Input } from '@angular/core';
import { Observable } from 'rxjs';
import { StoreService } from 'src/app/_services/store.service';
import { GlobalConstants } from 'src/app/global-constants';
import { EventEmitterService } from 'src/app/_services/event-emitter.service';

@Component({
  selector: 'app-store-sidebar',
  templateUrl: './store-sidebar.component.html'
})
export class StoreSidebarComponent implements OnInit {
  category_observer: Observable<any>;

  constructor(
              private storeService: StoreService,
              private emitterService: EventEmitterService
            ) { }

  @Input() page_title:string;
  @Input() FinalCartArray;
  @Input() total_price:number;

  categoriesArray = [];

  Cart_Array  = [];
  Cart_Storage_Json:string;
  //Final_Cart_Array  = [];

  cart_array_observer: Observable<any>;

  server_url:string = GlobalConstants.serverUrl;
  thumb_path:string = GlobalConstants.Prd_Img_200_Path;

  ngOnInit(): void {
    //this.Final_Cart_Array = this.FinalCartArray
    
    //++++++++++++++++++++++++ FETCH ACTIVE CATEGORIES :: Start ++++++++++++++++++++++++//
    this.category_observer = this.storeService.get_categories();

    this.category_observer.subscribe(cat_res => {
      this.categoriesArray  = cat_res;
    });
    //++++++++++++++++++++++++ FETCH ACTIVE CATEGORIES :: End ++++++++++++++++++++++++//

    this.Cart_Storage_Json = localStorage.getItem('Storage_Cart_Array');
    this.Cart_Array = JSON.parse( this.Cart_Storage_Json );

    //++++++++++++++++++++++++ GET TOTAL CART PRICE :: Start ++++++++++++++++++++++++//
    this.regenerate_cart_data();
    //++++++++++++++++++++++++ GET TOTAL CART PRICE :: End ++++++++++++++++++++++++//
  }

  remove_item_from_cart( itemId ){
    this.Cart_Storage_Json = localStorage.getItem('Storage_Cart_Array');
    this.Cart_Array = JSON.parse( this.Cart_Storage_Json );

    //++++++++++++++++++++++++ GET TOTAL CART PRICE :: Start ++++++++++++++++++++++++//
    this.regenerate_cart_data();
    //++++++++++++++++++++++++ GET TOTAL CART PRICE :: End ++++++++++++++++++++++++//
    
    this.Cart_Array = this.Cart_Array.filter(function( obj ) {
      return obj.item_id !== itemId;
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
        this.FinalCartArray = cart_res.cart_array;
      }
      else{
        this.FinalCartArray = [];
      }

      this.total_price = (typeof cart_res.total_price !== 'undefined') ? cart_res.total_price : 0;

      this.emitterService.sendCartData(this.total_price);
    });
    //++++++++++++++++++++++++ GENERATE CART ARRAY :: End ++++++++++++++++++++++++//
  }

}
