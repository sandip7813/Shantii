import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { HomeComponent } from './_pages/home/home.component';
import { StoreComponent } from './_pages/store/store.component';
import { GalleryComponent } from './_pages/gallery/gallery.component';
import { ContactComponent } from './_pages/contact/contact.component';
import { ProductdetailsComponent } from './_pages/productdetails/productdetails.component';
import { PagenotfoundComponent } from './_pages/pagenotfound/pagenotfound.component';
import { VideosComponent } from './_pages/videos/videos.component';
import { VideodetailsComponent } from './_pages/videodetails/videodetails.component';

const routes: Routes = [
  { path: '', component: HomeComponent },
  { path: 'store', component: StoreComponent },
  { path: 'store/:slug', component: StoreComponent },
  { path: 'product/:slug', component: ProductdetailsComponent },
  { path: 'gallery', component: GalleryComponent },
  { path: 'videos', component: VideosComponent },
  { path: 'video/:slug', component: VideodetailsComponent },
  { path: 'contact', component: ContactComponent },
  { path: '**', component: PagenotfoundComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
