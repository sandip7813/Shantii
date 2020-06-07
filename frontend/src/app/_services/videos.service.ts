import { Injectable } from '@angular/core';
import{ GlobalConstants } from '../global-constants';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class VideosService {
  server_url = GlobalConstants.serverUrl + 'api/';

  constructor(private http: HttpClient) { }

  get_active_videos(){
    const videos_url = this.server_url + 'active-videos';
    return this.http.get( videos_url );
  }

  get_video_details(video_slug){
    const video_dtls_url = this.server_url + 'video-details/' + video_slug;
    return this.http.get( video_dtls_url );
  }

}
