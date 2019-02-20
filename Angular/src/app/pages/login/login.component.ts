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
    this.loginService.login(user.value, localStorage.getItem("token")).subscribe(
      (res) => {
        console.log(res);
      }
    );
  }
}
