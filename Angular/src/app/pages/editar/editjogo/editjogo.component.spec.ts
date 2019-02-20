import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { EditjogoComponent } from './editjogo.component';

describe('EditjogoComponent', () => {
  let component: EditjogoComponent;
  let fixture: ComponentFixture<EditjogoComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ EditjogoComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(EditjogoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
