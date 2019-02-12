import { Component, OnInit, Output } from '@angular/core';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {

	private titulos = [
		"Popular", "Promoções", "Para Você"	
  ];
  
  constructor() { }

  ngOnInit() {
  }

}
