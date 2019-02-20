import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css']
})
export class NavbarComponent implements OnInit {

  constructor() { }

  ngOnInit() {
  }

  isDev(){
    let permission = localStorage.getItem("permission");
    if(permission == "1") {
      return true;
    } else {
      return false;
    }
  }
}
