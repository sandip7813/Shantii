import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { HomeGalleryMerchandiseComponent } from './home-gallery-merchandise.component';

describe('HomeGalleryMerchandiseComponent', () => {
  let component: HomeGalleryMerchandiseComponent;
  let fixture: ComponentFixture<HomeGalleryMerchandiseComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ HomeGalleryMerchandiseComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(HomeGalleryMerchandiseComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
