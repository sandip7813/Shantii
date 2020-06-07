import { Component, OnInit } from '@angular/core';
import { Observable } from 'rxjs';
import { StoreService } from 'src/app/_services/store.service';
import { ActivatedRoute } from '@angular/router';
import { GlobalConstants } from 'src/app/global-constants';

@Component({
  selector: 'app-productdetails',
  templateUrl: './productdetails.component.html'
})
export class ProductdetailsComponent implements OnInit {
  products_observer: Observable<any>;

  server_url:string = GlobalConstants.serverUrl;

  thumb_path:string = GlobalConstants.Prd_Img_200_Path;
  mid_path:string = GlobalConstants.Prd_Img_780_Path;

  constructor(
    private storeService: StoreService,
    private route: ActivatedRoute
    ) { }

  breadArray = [];
  pageTitle: string = '';
  
  cat_title: string = '';
  cat_slug: string = '';
  prod_id: number = 0;
  prod_title: string = '';
  prod_slug: string = '';
  prod_desc: string = '';
  prod_price: number = 0;
  items_left: number = 0;

  productArray   = [];
  picturesArray  = [];

  large_picture: string = '';

  ngOnInit(): void {
    this.pageTitle = 'Product Details';

    this.prod_slug = this.route.snapshot.paramMap.get('slug');

    //++++++++++++++++++++++++ FETCH PRODUCT DETAILS :: Start ++++++++++++++++++++++++//
    this.products_observer = this.storeService.get_product_details(this.prod_slug);

    this.products_observer.subscribe(prod_res => {
      this.productArray  = prod_res;

      //console.log(this.productArray);

      this.cat_slug   = prod_res.categories[0].category_slug;
      this.cat_title  = prod_res.categories[0].category_title;
      this.prod_id    = prod_res.id;
      this.prod_title = prod_res.product_name;
      this.prod_desc  = prod_res.product_description;
      this.prod_price = prod_res.product_price;
      this.items_left = prod_res.items_left;

      this.picturesArray  = prod_res.pictures;

      this.large_picture  = this.mid_path + prod_res.pictures[0].image_title;

      //++++++++++++++++++++++++ GENERATE BREADCRUMB :: Start ++++++++++++++++++++++++//
      this.breadArray.push(
        {href_path: './', bread_text: 'Home', bread_class: ''},
        {href_path: './store', bread_text:'Store', bread_class: ''},
        {href_path: './store/'+ this.cat_slug, bread_text:this.cat_title},
        {href_path: './product/'+ this.prod_slug, bread_text:this.prod_title, bread_class: 'active'},
      );
      //++++++++++++++++++++++++ GENERATE BREADCRUMB :: End ++++++++++++++++++++++++//

    });
    //++++++++++++++++++++++++ FETCH PRODUCT DETAILS :: End ++++++++++++++++++++++++//

  }

  getImageSrc(img_title){
    this.large_picture = this.mid_path + img_title;
  }

}
