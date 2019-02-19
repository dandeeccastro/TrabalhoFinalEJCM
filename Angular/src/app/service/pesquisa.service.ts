import { Injectable } from '@angular/core';
import { HttpClient } from "@angular/common/http";
import { map } from 'rxjs/operators';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class PesquisaService {

  private apiURL: string = "http://localhost:8000/api/";

  constructor(public http: HttpClient) { }

  public pesquisarJogo(nomeDoJogo: string): Observable<any> {
    return this.http.post(this.apiURL + "pesquisar", {
      nome: nomeDoJogo
    }).pipe(map(res => res));
  }

  public getJogos(): Observable<any> {
    return this.http.get(this.apiURL + "jogos").pipe(map(res => res));
  }

  public getJogosByCategoria(id:number): Observable<any>{
    return this.http.get(this.apiURL + "getCategoria/" + id).pipe(map(res => res));
  }
}