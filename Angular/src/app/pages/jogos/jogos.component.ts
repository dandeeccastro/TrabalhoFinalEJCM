import { MaterializeAction } from "angular2-materialize";
import { Component, OnInit, EventEmitter } from '@angular/core';
import { ScrolltopService } from '../../service/scrolltop.service';

@Component({
  selector: 'app-jogos',
  templateUrl: './jogos.component.html',
  styleUrls: ['./jogos.component.css']
})
export class JogosComponent implements OnInit {

  modalActions = new EventEmitter<string|MaterializeAction>();

  /* Isso é bem temporário, visto que essa intel vem do back */
  title: string = "Doom";
  description: string = "Mate os demonios e aniquile nazistas nesse FPS topperson mano q isso ce e loko";
  constructor(private scrolltop : ScrolltopService) { }

  ngOnInit() {
    this.scrolltop.setScrollTop();
  }

  abreModal() {
    this.modalActions.emit({action:"modal",params:['open']});
  }

  fechaModal(){
    this.modalActions.emit({action:"modal",params:['close']});
  }

}
