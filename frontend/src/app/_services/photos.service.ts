import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import{ GlobalConstants } from '../global-constants';

@Injectable({
  providedIn: 'root'
})
export class PhotosService {
  server_url = GlobalConstants.serverUrl + 'api/';

  constructor(private http: HttpClient) { }

  get_gallery_photos(photo_type){
    const photo_gallery_url = this.server_url + 'home-photos/' + photo_type;
    return this.http.get( photo_gallery_url );
  }

}
