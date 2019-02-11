import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { DisplayJogosComponent } from './display-jogos.component';

describe('DisplayJogosComponent', () => {
  let component: DisplayJogosComponent;
  let fixture: ComponentFixture<DisplayJogosComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DisplayJogosComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DisplayJogosComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
