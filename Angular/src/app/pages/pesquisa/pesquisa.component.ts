import { Component, OnInit } from '@angular/core';
import { PesquisaService } from '../../service/pesquisa.service';
import { Router } from '@angular/router'; 
import { ScrolltopService } from '../../service/scrolltop.service';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-pesquisa',
  templateUrl: './pesquisa.component.html',
  styleUrls: ['./pesquisa.component.css']
})
export class PesquisaComponent implements OnInit {

  tags: string[] = [
    "Aventura", "RPG", "RTS", "FPS", "TPS", "Estratégia"
  ]
  games: string[] =[
    "Doom", "Warcraft", "Lolzin", "Furi", "Fez", "Celeste", "Warhammer 4k"
  ]
  private siteUrl: string = "http://localhost:4200";
  constructor(private scrolltop : ScrolltopService, public pesquisaService: PesquisaService,private router: Router) { }

  ngOnInit() {
    this.scrolltop.setScrollTop();
  }

  checkGame() {
    this.router.navigate(['jogos']);
  }

  searchGame(nome){
    console.log("estou sendo chamado");
    console.log(nome.value);
    console.log(this.pesquisaService.pesquisarJogo(nome.value));
  }

}
