import { Component, OnInit } from '@angular/core';
import { ScrolltopService } from '../../service/scrolltop.service';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-cadastro',
  templateUrl: './cadastro.component.html',
  styleUrls: ['./cadastro.component.css']
})
export class CadastroComponent implements OnInit {

  private switch: boolean = false;
  constructor(private scrolltop : ScrolltopService) { }

  ngOnInit() {
    this.scrolltop.setScrollTop();
  }
}
