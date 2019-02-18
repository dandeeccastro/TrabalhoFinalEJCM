import { Component, OnInit } from '@angular/core';
import { ScrolltopService } from '../../service/scrolltop.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  constructor(private scrolltop : ScrolltopService) { }

  ngOnInit() {
    this.scrolltop.setScrollTop();
  }

}
