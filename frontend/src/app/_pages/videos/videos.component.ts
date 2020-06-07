import { Component, OnInit } from '@angular/core';
import { VideosService } from 'src/app/_services/videos.service';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-videos',
  templateUrl: './videos.component.html',
  styleUrls: ['./videos.component.css']
})
export class VideosComponent implements OnInit {
  observer: Observable<any>;

  constructor(private videoService: VideosService) { }

  breadArray = [];
  pageTitle: string = '';

  youTube_ID: string = '';
  array_length:number = 0;

  videosArray = [];

  YouTubeGetID(url){
    var ID = '';
    url = url.replace(/(>|<)/gi,'').split(/(vi\/|v=|\/v\/|youtu\.be\/|\/embed\/)/);
    if(url[2] !== undefined) {
      ID = url[2].split(/[^0-9a-z_\-]/i);
      ID = ID[0];
    }
    else {
      ID = url;
    }
      return ID;
  }

  ngOnInit(): void {
    this.pageTitle = 'Videos';

    //++++++++++++++++++++++++ GENERATE BREADCRUMB :: Start ++++++++++++++++++++++++//
    this.breadArray.push(
      {href_path: './', bread_text: 'Home', bread_class: ''},
      {href_path: './videos', bread_text:this.pageTitle, bread_class: 'active'},
      );
    //++++++++++++++++++++++++ GENERATE BREADCRUMB :: End ++++++++++++++++++++++++//

    //++++++++++++++++++++++++ FETCH ACTIVE PRODUCTS :: Start ++++++++++++++++++++++++//
    this.observer = this.videoService.get_active_videos();

    this.observer.subscribe(res => {
      this.array_length = res.length;

      for(var v = 0; v < this.array_length; v++){
        this.youTube_ID = this.YouTubeGetID(res[v].video_link);

        res[v]['youtube_id']  = this.youTube_ID;
        res[v]['short_title'] = res[v].video_title.substring(0, 60) + '...';
      }

      this.videosArray = res;

      console.log(this.videosArray);
    });
    //++++++++++++++++++++++++ FETCH ACTIVE PRODUCTS :: End ++++++++++++++++++++++++//
    
  }

  

}
