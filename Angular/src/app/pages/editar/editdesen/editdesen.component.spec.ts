import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { EditdesenComponent } from './editdesen.component';

describe('EditdesenComponent', () => {
  let component: EditdesenComponent;
  let fixture: ComponentFixture<EditdesenComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ EditdesenComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(EditdesenComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
