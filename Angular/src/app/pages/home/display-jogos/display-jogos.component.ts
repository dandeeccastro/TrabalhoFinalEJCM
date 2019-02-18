import { Component, OnInit, Input } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-display-jogos',
  templateUrl: './display-jogos.component.html',
  styleUrls: ['./display-jogos.component.css']
})
export class DisplayJogosComponent implements OnInit {

	@Input() titulo;
	@Input() preco;

	constructor(private router: Router) { 
	}

	
	ngOnInit() {  
		console.log(this.titulo);
	}
		
	checkGame() {
		this.router.navigate(['jogos']);
	}

}