import { Component, OnInit, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'app-jogador',
  templateUrl: './jogador.component.html',
  styleUrls: ['./jogador.component.css']
})
export class JogadorComponent implements OnInit {

  constructor() { }

  ngOnInit() {
  }

  @Output() form = new EventEmitter<any>();
  onSubmit(ngForm){
    this.form.emit(ngForm);
  }
}
