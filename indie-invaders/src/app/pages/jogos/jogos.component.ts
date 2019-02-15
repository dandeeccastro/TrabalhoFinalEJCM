import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-jogos',
  templateUrl: './jogos.component.html',
  styleUrls: ['./jogos.component.css']
})
export class JogosComponent implements OnInit {

  /* Isso é bem temporário, visto que essa intel vem do back */
  title: string = "Doom";
  description: string = "Mate os demonios e aniquile nazistas nesse FPS topperson mano q isso ce e loko";

  constructor() { }

  ngOnInit() {
  }

}
