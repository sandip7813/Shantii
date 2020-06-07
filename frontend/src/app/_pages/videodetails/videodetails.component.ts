import { Component, OnInit } from '@angular/core';
import { Observable } from 'rxjs';
import { VideosService } from 'src/app/_services/videos.service';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-videodetails',
  templateUrl: './videodetails.component.html'
})
export class VideodetailsComponent implements OnInit {
  video_observer: Observable<any>;

  constructor(
    private videoService: VideosService,
    private route: ActivatedRoute
  ) { }

  breadArray = [];
  pageTitle: string = '';

  vid_slug: string = '';
  youTube_ID: string = '';
  youTube_img: string = '';
  video_details: string = '';

  //+++++++++++++++++++++++++ GET YOUTUBE ID :: Start +++++++++++++++++++++++++//
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
  //+++++++++++++++++++++++++ GET YOUTUBE ID :: End +++++++++++++++++++++++++//

  ngOnInit(): void {
    this.vid_slug = this.route.snapshot.paramMap.get('slug');

    //++++++++++++++++++++++++ FETCH VIDEO DETAILS :: Start ++++++++++++++++++++++++//
    this.video_observer = this.videoService.get_video_details(this.vid_slug);

    this.video_observer.subscribe(vid_res => {
      if( vid_res.length > 0 ){
        this.youTube_ID     = this.YouTubeGetID(vid_res[0].video_link);
        this.youTube_img    = 'http://img.youtube.com/vi/'+this.youTube_ID+'/sddefault.jpg';
        this.video_details  = vid_res[0].video_description;

        this.pageTitle = vid_res[0].video_title;

        //++++++++++++++++++++++++ GENERATE BREADCRUMB :: Start ++++++++++++++++++++++++//
        this.breadArray.push(
          {href_path: './', bread_text: 'Home', bread_class: ''},
          {href_path: './videos', bread_text:'Videos', bread_class: ''},
          {href_path: './video/'+ this.vid_slug, bread_text:this.vid_slug, bread_class: 'active'},
        );
        //++++++++++++++++++++++++ GENERATE BREADCRUMB :: End ++++++++++++++++++++++++//
      }
      
    });
    //++++++++++++++++++++++++ FETCH VIDEO DETAILS :: End ++++++++++++++++++++++++//
  }

}
