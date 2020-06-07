import { Component, OnInit, Output } from '@angular/core';
import { Observable } from 'rxjs';
import { StoreService } from 'src/app/_services/store.service';
import { ActivatedRoute } from '@angular/router';
import { GlobalConstants } from 'src/app/global-constants';
import { EventEmitter } from 'protractor';

@Component({
  selector: 'app-store',
  templateUrl: './store.component.html'
})
export class StoreComponent implements OnInit {
  category_observer: Observable<any>;
  products_observer: Observable<any>;

  server_url:string = GlobalConstants.serverUrl;

  thumb_path:string = GlobalConstants.Prd_Img_780_Path;

  @Output() cart_price  = new EventEmitter();

  constructor(
              private storeService: StoreService,
              private route: ActivatedRoute
              ) { }

  breadArray = [];
  pageTitle: string = '';

  categoriesArray = [];
  productsArray   = [];

  category_length:number = 0;
  product_length:number = 0;

  cat_title: string = '';

  ngOnInit(): void {
    this.pageTitle = 'Store';
    
    //++++++++++++++++++++++++ GET URL PARAM :: Start ++++++++++++++++++++++++//
    var cat_slug = this.route.snapshot.paramMap.get('slug');

    if( !cat_slug ){
      cat_slug  = 'all';
    }
    //++++++++++++++++++++++++ GET URL PARAM :: End ++++++++++++++++++++++++//
    
    //++++++++++++++++++++++++ FETCH ACTIVE CATEGORIES :: Start ++++++++++++++++++++++++//
    this.category_observer = this.storeService.get_categories();

    this.category_observer.subscribe(cat_res => {
      this.categoriesArray  = cat_res;
    });
    //++++++++++++++++++++++++ FETCH ACTIVE CATEGORIES :: End ++++++++++++++++++++++++//

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

      //console.log(this.productsArray);
    });
    //++++++++++++++++++++++++ FETCH ACTIVE PRODUCTS :: End ++++++++++++++++++++++++//

  }

  add_to_cart(cart_id){
    this.cart_price.emit(cart_id);
  }

}
