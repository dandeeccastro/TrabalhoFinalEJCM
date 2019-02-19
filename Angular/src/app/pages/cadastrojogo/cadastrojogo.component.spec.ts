import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CadastrojogoComponent } from './cadastrojogo.component';

describe('CadastrojogoComponent', () => {
  let component: CadastrojogoComponent;
  let fixture: ComponentFixture<CadastrojogoComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CadastrojogoComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CadastrojogoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
