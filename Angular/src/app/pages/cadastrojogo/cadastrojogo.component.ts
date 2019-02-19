import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-cadastrojogo',
  templateUrl: './cadastrojogo.component.html',
  styleUrls: ['./cadastrojogo.component.css']
})
export class CadastrojogoComponent implements OnInit {

  constructor() { }

  ngOnInit() {
  }
  onSubmit(cadastrojogo){
  	console.log(cadastrojogo);
  }

}
