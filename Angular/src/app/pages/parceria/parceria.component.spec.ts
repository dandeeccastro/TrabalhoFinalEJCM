import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ParceriaComponent } from './parceria.component';

describe('ParceriaComponent', () => {
  let component: ParceriaComponent;
  let fixture: ComponentFixture<ParceriaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ParceriaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ParceriaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
