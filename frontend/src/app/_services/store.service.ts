import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import{ GlobalConstants } from '../global-constants';

@Injectable({
  providedIn: 'root'
})
export class StoreService {
  server_url = GlobalConstants.serverUrl + 'api/';

  constructor(private http: HttpClient) { }

  get_categories(){
    const category_url = this.server_url + 'active-categories';
    return this.http.get( category_url );
  }

  get_products(category_slug){
    const products_url = this.server_url + 'store-products/' + category_slug;
    return this.http.get( products_url );
  }

  get_product_details(product_slug){
    const product_dtls_url = this.server_url + 'products-details/' + product_slug;
    return this.http.get( product_dtls_url );
  }
  
}
