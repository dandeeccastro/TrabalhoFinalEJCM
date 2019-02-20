import { Component, OnInit } from '@angular/core';
import { ScrolltopService } from '../../service/scrolltop.service';
import { LoginService } from '../../service/login.service';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  constructor(private scrolltop : ScrolltopService, private loginService: LoginService) { }

  ngOnInit() {
    this.scrolltop.setScrollTop();
  }
  onSubmit(user){
    console.log(user.value);
    this.loginService.login(user.value).subscribe(
      (res) => {
        console.log(res);
        localStorage.setItem("token",res.success.token);
        console.log(res.cliente, res.vendedor);
        if(res.role.cliente != null){
          
          localStorage.setItem("permission","0");
        } else {
          localStorage.setItem("permission","1");
        }
      }
    );
  }
/*
  getDetails(){
     this.loginService.getDetails().subscribe(
      (res) => {
        console.log( res);
      }
    );
  }*/
}
