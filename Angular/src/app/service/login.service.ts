import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from "@angular/common/http";
import { map } from 'rxjs/operators';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class LoginService {

  private apiURL: string = "http://localhost:8000/api/";
  constructor(public http: HttpClient) { }

  public login(user,token) {
    var header = new HttpHeaders({
      Accept: 'application/json',
      Authorization: 'Bearer ' + token
    });
    console.log(user.username, user.password);
    return this.http.post(this.apiURL + "login", {
      username: user.username,
      password: user.password, 
    }, { headers: header }).pipe(map(res => res));
  }
}
