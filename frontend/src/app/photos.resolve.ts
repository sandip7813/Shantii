import { Injectable } from '@angular/core';
import { Resolve, ActivatedRouteSnapshot,RouterStateSnapshot } from '@angular/router';
import { Observable } from 'rxjs';
import { PhotosService } from './_services/photos.service';

@Injectable()

export class PhotosResolve implements Resolve<any> {

 constructor(private photoService: PhotosService){}

 resolve(route:ActivatedRouteSnapshot, 
        state:RouterStateSnapshot,
       ): Observable<any> {
    return this.photoService.get_home_gallery_photos();  
  }
}