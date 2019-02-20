import { Injectable } from '@angular/core';
import { HttpClient } from "@angular/common/http";
import { map } from 'rxjs/operators';
import { Observable } from 'rxjs';


@Injectable({
  providedIn: 'root'
})
export class CadastroService {

  private apiURL: string = "http://localhost:8000/api/";
  constructor(public http: HttpClient) { }

  cadastrarJogador(jogador): Observable<any> {
    return this.http.post(this.apiURL + "clientes", {
      name: jogador.nome,
      email: jogador.email,
      password: jogador.senha,
      c_password: jogador.senha1,
      cpf: jogador.cpf,
      username: jogador.usuario,
      dataDeNascimento: jogador.nascimento,
      telefone: jogador.telefone,
      numeroCartao: jogador.cartao,
      nomeTitularCartao: jogador.nometitular,
      codigoSegurancaCartao: jogador.seguranca,
      bandeiraCartao: jogador.bandeiraCartao,
      dataDeVencimentoCartao: jogador.vencimentoCartao
    }).pipe(map(res => res));
  }

  cadastrarDesenvolvedor(dev): Observable<any> {
    return this.http.post(this.apiURL + "vendedor", {
      name: dev.nome,
      email: dev.email,
      password: dev.senha,
      c_password: dev.senha1,
      cpf: dev.cpf,
      username: dev.usuario,
      dataDeNascimento: dev.nascimento,
      telefone: dev.telefone,
      ContaCorrente: dev.conta,
      agencia: dev.agencia,
      banco: dev.banco,
      operacao: dev.operacao
    }).pipe(map(res => res));
  }
}
