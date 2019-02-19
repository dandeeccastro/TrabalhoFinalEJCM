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

  public pesquisarJogo(nome: string) {
    return this.http.post(this.apiURL + "pesquisar", nome).pipe(map(res => res));
  }

}