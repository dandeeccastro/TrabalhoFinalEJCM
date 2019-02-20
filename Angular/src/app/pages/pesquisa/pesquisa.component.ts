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
    "Aventura", "Survival","Arcade","RPG","Corrida","Esportes","Estratégia","Ação"
  ]
  games: string[] =[
    "Doom", "Warcraft", "Lolzin", "Furi", "Fez", "Celeste", "Warhammer 4k"
  ]
  private siteUrl: string = "http://localhost:4200";
  private categorySelector: number;
  constructor(private scrolltop : ScrolltopService, public pesquisaService: PesquisaService,private router: Router) { }

  ngOnInit() {
    this.scrolltop.setScrollTop();
    this.getGames();
  }

  checkGame() {
    this.router.navigate(['jogos']);
  }

  searchGame(nome){
    console.log("estou sendo chamado");
    console.log(nome.value);
    this.pesquisaService.pesquisarJogo(nome.value).subscribe(
      (res) => {
        console.log(res);
      }
    );
  }

  getGames(){
    this.pesquisaService.getJogos().subscribe(
      (res) => {
        console.log(res);
      }
    );
  }

  getGamesByCategory(){
    let id: number =  this.categorySelector;
    if(id != null){
      this.pesquisaService.getJogosByCategoria(id).subscribe(
        (res) => {
          console.log(res);
        }
      );
    }
  }
}
