import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { EditjogadorComponent } from './editjogador.component';

describe('EditjogadorComponent', () => {
  let component: EditjogadorComponent;
  let fixture: ComponentFixture<EditjogadorComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ EditjogadorComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(EditjogadorComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
