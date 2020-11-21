import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { ReactiveFormsModule } from '@angular/forms';

import { AppComponent } from './app.component';
import { HomeComponent } from './_pages/home/home.component';
import { HeaderSearchComponent } from './_pages/_includes/header-search/header-search.component';
import { HeaderTopCartComponent } from './_pages/_includes/header-top-cart/header-top-cart.component';
import { HeaderNavComponent } from './_pages/_includes/header-nav/header-nav.component';
import { HomeBannerComponent } from './_pages/_includes/home-banner/home-banner.component';
import { HomeAboutComponent } from './_pages/_includes/home-about/home-about.component';
import { HomeVideoComponent } from './_pages/_includes/home-video/home-video.component';
import { HomeGalleryComponent } from './_pages/_includes/home-gallery/home-gallery.component';
import { HomeContactComponent } from './_pages/_includes/home-contact/home-contact.component';
import { FooterMainComponent } from './_pages/_includes/footer-main/footer-main.component';
import { FooterBottomComponent } from './_pages/_includes/footer-bottom/footer-bottom.component';
import { StoreComponent } from './_pages/store/store.component';
import { GalleryComponent } from './_pages/gallery/gallery.component';
import { ContactComponent } from './_pages/contact/contact.component';
import { BreadcrumbsComponent } from './_pages/_includes/breadcrumbs/breadcrumbs.component';
import { HomeGalleryMerchandiseComponent } from './_pages/_includes/home-gallery-merchandise/home-gallery-merchandise.component';
import { HttpClientModule } from '@angular/common/http';
import { NgImageSliderModule } from 'ng-image-slider';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { ProductdetailsComponent } from './_pages/productdetails/productdetails.component';
import { PagenotfoundComponent } from './_pages/pagenotfound/pagenotfound.component';
import { VideosComponent } from './_pages/videos/videos.component';
import { VideodetailsComponent } from './_pages/videodetails/videodetails.component';
import { ShopcartComponent } from './_pages/shopcart/shopcart.component';
import { StoreSidebarComponent } from './_pages/_includes/store-sidebar/store-sidebar.component';
import { EventEmitterService } from './_services/event-emitter.service';

@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    HeaderSearchComponent,
    HeaderTopCartComponent,
    HeaderNavComponent,
    HomeBannerComponent,
    HomeAboutComponent,
    HomeVideoComponent,
    HomeGalleryComponent,
    HomeContactComponent,
    FooterMainComponent,
    FooterBottomComponent,
    StoreComponent,
    GalleryComponent,
    ContactComponent,
    BreadcrumbsComponent,
    HomeGalleryMerchandiseComponent,
    ProductdetailsComponent,
    PagenotfoundComponent,
    VideosComponent,
    VideodetailsComponent,
    ShopcartComponent,
    StoreSidebarComponent
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    AppRoutingModule,
    ReactiveFormsModule,
    NgImageSliderModule,
    BrowserAnimationsModule
  ],
  providers: [EventEmitterService],
  bootstrap: [AppComponent]
})
export class AppModule { }
