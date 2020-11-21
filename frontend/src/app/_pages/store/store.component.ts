import { Component, OnInit } from '@angular/core';
import { Observable } from 'rxjs';
import { StoreService } from 'src/app/_services/store.service';
import { ActivatedRoute } from '@angular/router';
import { GlobalConstants } from 'src/app/global-constants';
import { EventEmitterService } from 'src/app/_services/event-emitter.service';

@Component({
  selector: 'app-store',
  templateUrl: './store.component.html'
})
export class StoreComponent implements OnInit {
  category_observer: Observable<any>;
  products_observer: Observable<any>;
  cart_price_observer: Observable<any>;
  cart_array_observer:Observable<any>;

  server_url:string = GlobalConstants.serverUrl;

  thumb_path:string = GlobalConstants.Prd_Img_780_Path;

  item_id:number;
  item_price:number = 0.00;

  constructor(
              private storeService: StoreService,
              private route: ActivatedRoute,
              private emitterService: EventEmitterService
              ) { }

  breadArray = [];
  pageTitle: string = '';

  //categoriesArray = [];
  productsArray   = [];

  category_length:number = 0;
  product_length:number = 0;

  cat_title: string = '';

  Cart_Array  = [];
  Is_Item_Exists: boolean = false;
  Cart_Storage_Json:string;
  Final_Cart_Array  = [];
  total_price:number = 0.00;

  ngOnInit(): void {
    this.pageTitle = 'Store';
    
    //++++++++++++++++++++++++ GET URL PARAM :: Start ++++++++++++++++++++++++//
    var cat_slug = this.route.snapshot.paramMap.get('slug');

    if( !cat_slug ){
      cat_slug  = 'all';
    }
    //++++++++++++++++++++++++ GET URL PARAM :: End ++++++++++++++++++++++++//

    //++++++++++++++++++++++++ FETCH ACTIVE PRODUCTS :: Start ++++++++++++++++++++++++//
    this.products_observer = this.storeService.get_products(cat_slug);

    this.products_observer.subscribe(prod_res => {
      if( (cat_slug != '') && (cat_slug != 'all') ){
        this.cat_title  = prod_res[0].category_title;

        //++++++++++++++++++++++++ GENERATE BREADCRUMB :: Start ++++++++++++++++++++++++//
        this.breadArray.push(
          {href_path: './', bread_text: 'Home', bread_class: ''},
          {href_path: './store', bread_text:this.pageTitle, bread_class: ''},
          {href_path: './store/'+cat_slug, bread_text:this.cat_title, bread_class: 'active'},
        );
        //++++++++++++++++++++++++ GENERATE BREADCRUMB :: End ++++++++++++++++++++++++//
      }
      else{
        this.cat_title  = 'All Products';

        //++++++++++++++++++++++++ GENERATE BREADCRUMB :: Start ++++++++++++++++++++++++//
        this.breadArray.push(
          {href_path: './', bread_text: 'Home', bread_class: ''},
          {href_path: './store', bread_text:this.pageTitle, bread_class: 'active'},
        );
        //++++++++++++++++++++++++ GENERATE BREADCRUMB :: End ++++++++++++++++++++++++//
      }

      this.category_length = prod_res.length;

      for(var c = 0; c < this.category_length; c++){
        this.product_length = prod_res[c].products.length;

        for(var p = 0; p < this.product_length; p++){
          this.productsArray.push(prod_res[c].products[p]);
        }
      }
    });
    //++++++++++++++++++++++++ FETCH ACTIVE PRODUCTS :: End ++++++++++++++++++++++++//

    this.Cart_Storage_Json = localStorage.getItem('Storage_Cart_Array');
    this.Cart_Array = JSON.parse( this.Cart_Storage_Json );

    //++++++++++++++++++++++++ GET TOTAL CART PRICE :: Start ++++++++++++++++++++++++//
    this.cart_price_observer  = this.storeService.generate_cart_products( this.Cart_Array );

    this.cart_price_observer.subscribe(price_res => {
      this.item_price = (typeof price_res.total_price !== 'undefined') ? price_res.total_price : 0;
    });
    //++++++++++++++++++++++++ GET TOTAL CART PRICE :: End ++++++++++++++++++++++++//

    this.regenerate_cart_data();
  }

  add_to_cart(product_id, product_price){
    this.Cart_Storage_Json = localStorage.getItem('Storage_Cart_Array');
    this.Cart_Array = JSON.parse( this.Cart_Storage_Json );
    
    var Cart_Obj    = {};
    
    this.item_id    = product_id;
    this.item_price = ( this.item_price + product_price );

    this.emitterService.sendCartData(this.item_price);

    this.Is_Item_Exists = this.Cart_Array.some(function(el){ return el.item_id === product_id});

    if( !this.Is_Item_Exists ){
      Cart_Obj = { item_id:product_id, total_items: 1 };
      
      this.Cart_Array.push( Cart_Obj );
    }
    else{
      this.Cart_Array.forEach(function (e) {
        if( e.item_id == product_id ){
          e.total_items++;
        }
      });
    }

    localStorage.setItem( 'Storage_Cart_Array', JSON.stringify( this.Cart_Array ) );

    this.regenerate_cart_data();
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
