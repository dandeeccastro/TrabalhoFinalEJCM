import { MaterializeAction } from "angular2-materialize";
import { Component, OnInit, EventEmitter } from '@angular/core';

@Component({
  selector: 'app-cadastrojogo',
  templateUrl: './cadastrojogo.component.html',
  styleUrls: ['./cadastrojogo.component.css']
})
export class CadastrojogoComponent implements OnInit {

  modalActions = new EventEmitter<string|MaterializeAction>();

  constructor() { }

  ngOnInit() {
  }

  onSubmit(cadastrojogo){
  	console.log(cadastrojogo);
  }

  abreModal() {
    this.modalActions.emit({action:"modal",params:['open']});
  }

  fechaModal(){
    this.modalActions.emit({action:"modal",params:['close']});
  }

}
