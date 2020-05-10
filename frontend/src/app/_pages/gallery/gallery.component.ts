import { Component, OnInit } from '@angular/core';
import { PhotosService } from 'src/app/_services/photos.service';
import { Observable } from 'rxjs';
import { GlobalConstants } from 'src/app/global-constants';

@Component({
  selector: 'app-gallery',
  templateUrl: './gallery.component.html',
  styleUrls: ['./gallery.component.css']
})
export class GalleryComponent implements OnInit {
  observer: Observable<any>;

  server_url:string = GlobalConstants.serverUrl;

  img_path:string = GlobalConstants.Img_Large_Path;
  thumb_path:string = GlobalConstants.Img_780_Path;

  profilePhotos = [];
  merchandisePhotos = [];

  breadArray = [];
  pageTitle: string = '';

  array_length:number = 0;

  constructor(private photoService: PhotosService) { }

  ngOnInit(): void {
    this.pageTitle = 'Gallery';
    
    //++++++++++++++++++++++++ GENERATE BREADCRUMB :: Start ++++++++++++++++++++++++//
    this.breadArray.push(
      {href_path: '/', bread_text: 'Home', bread_class: ''},
      {href_path: '/gallery', bread_text:this.pageTitle, bread_class: 'active'},
      );
    //++++++++++++++++++++++++ GENERATE BREADCRUMB :: End ++++++++++++++++++++++++//

    //++++++++++++++++++++++++ FETCH PHOTOS :: Start ++++++++++++++++++++++++//
    this.observer = this.photoService.get_gallery_photos('all');

    this.observer.subscribe(res => {
      this.array_length = res.length;

      for(var i = 0; i < this.array_length; i++){
        if(res[i].picture_catagory == 'profile'){
          this.profilePhotos.push(res[i]);
        }
        else if(res[i].picture_catagory == 'merchandise'){
          this.merchandisePhotos.push(res[i]);
        }
      }

    });
    //++++++++++++++++++++++++ FETCH PHOTOS :: End ++++++++++++++++++++++++//
  }

}
