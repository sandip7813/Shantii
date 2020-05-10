import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { HeaderTopCartComponent } from './header-top-cart.component';

describe('HeaderTopCartComponent', () => {
  let component: HeaderTopCartComponent;
  let fixture: ComponentFixture<HeaderTopCartComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ HeaderTopCartComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(HeaderTopCartComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
