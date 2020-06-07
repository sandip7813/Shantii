import { Injectable } from '@angular/core';
import { Resolve, ActivatedRouteSnapshot,RouterStateSnapshot } from '@angular/router';
import { Observable } from 'rxjs';
import { StoreService } from './_services/store.service';

@Injectable()

export class PhotosResolve implements Resolve<any> {

 constructor(private storeService: StoreService){}

 /* resolve(route:ActivatedRouteSnapshot, 
        state:RouterStateSnapshot,
       ): Observable<any> {
    return this.storeService.get_product_details();  
  }

  resolve(product_slug) {
    return this.storeService.get_product_details(product_slug);
  } */

  resolve(route:ActivatedRouteSnapshot, 
    state:RouterStateSnapshot,
   ): Observable<any> {
    return this.storeService.get_product_details(route.params.date);
  }
}