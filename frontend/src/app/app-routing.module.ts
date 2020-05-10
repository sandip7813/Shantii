import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { HomeComponent } from './_pages/home/home.component';
import { StoreComponent } from './_pages/store/store.component';
import { GalleryComponent } from './_pages/gallery/gallery.component';
import { ContactComponent } from './_pages/contact/contact.component';

const routes: Routes = [
  { path: '', component: HomeComponent },
  { path: 'store', component: StoreComponent },
  { path: 'gallery', component: GalleryComponent },
  { path: 'contact', component: ContactComponent }

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
