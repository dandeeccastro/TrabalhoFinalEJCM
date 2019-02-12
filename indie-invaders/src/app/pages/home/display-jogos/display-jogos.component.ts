import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-display-jogos',
  templateUrl: './display-jogos.component.html',
  styleUrls: ['./display-jogos.component.css']
})
export class DisplayJogosComponent implements OnInit {

	@Input() titulo

	constructor() { 
	}

  	ngOnInit() { 
 		console.log(this.titulo);
  	}

}