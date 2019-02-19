import { Component, OnInit, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'app-desenvolvedor',
  templateUrl: './desenvolvedor.component.html',
  styleUrls: ['./desenvolvedor.component.css']
})
export class DesenvolvedorComponent implements OnInit {

  constructor() { }

  ngOnInit() {
  }
  
  @Output() form = new EventEmitter<any>();
  onSubmit(ngForm){
    this.form.emit(ngForm);
  }

}
