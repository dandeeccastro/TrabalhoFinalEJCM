import { Component, OnInit } from '@angular/core';
import { ScrolltopService } from '../../service/scrolltop.service';

@Component({
  selector: 'app-parceria',
  templateUrl: './parceria.component.html',
  styleUrls: ['./parceria.component.css']
})
export class ParceriaComponent implements OnInit {

  constructor(private scrolltop : ScrolltopService) { }

  ngOnInit() {
    this.scrolltop.setScrollTop();
  }

}
