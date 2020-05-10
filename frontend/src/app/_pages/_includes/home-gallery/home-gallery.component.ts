import { Component, OnInit } from '@angular/core';
import { PhotosService } from 'src/app/_services/photos.service';
import { Observable } from 'rxjs';
import { GlobalConstants } from 'src/app/global-constants';

@Component({
  selector: 'app-home-gallery',
  templateUrl: './home-gallery.component.html'
})
export class HomeGalleryComponent implements OnInit {
  observer: Observable<any>;

  server_url:string = GlobalConstants.serverUrl;
  array_length:number = 0;

  img_title:string = '';

  img_path:string = GlobalConstants.Img_Large_Path;
  thumb_path:string = GlobalConstants.Img_780_Path;

  constructor(private photoService: PhotosService) { }

  imageObject: Array<object> = [];

  ngOnInit(): void {
    //++++++++++++++++++++++++ FETCH PHOTOS :: Start ++++++++++++++++++++++++//
    this.observer = this.photoService.get_gallery_photos('profile');

    this.observer.subscribe(res => {
      this.array_length = res.length;

      for(var i = 0; i < this.array_length; i++){
        this.img_title  = res[i].picture_title;

        this.imageObject.push(
          {
            image: this.img_path + this.img_title, 
            thumbImage: this.thumb_path + this.img_title
          }
        );
      }

    });
    //++++++++++++++++++++++++ FETCH PHOTOS :: End ++++++++++++++++++++++++//
  }

}
