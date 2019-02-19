import { Component, OnInit } from '@angular/core';
import { ScrolltopService } from '../../service/scrolltop.service';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-cadastro',
  templateUrl: './cadastro.component.html',
  styleUrls: ['./cadastro.component.css']
})
export class CadastroComponent implements OnInit {

  private cpfIsValid: boolean = false;
  private switch: boolean = false;

  constructor(private scrolltop : ScrolltopService) { }

  ngOnInit() {
    this.scrolltop.setScrollTop();
  }
  onSubmit(cadastro){
    console.log(cadastro);
  }

  validateCPF(cpf) {
    let cpfArray = cpf.value.toString();
    let falsePositive: boolean = true;
    // CPF tem 11 digitos?
    console.log(cpfArray.length);
    if (cpfArray.length == 11){
      // CPF é um falso positivo?
      for (let digit of cpfArray) {
        if (digit != cpfArray[0]) { falsePositive = false; }
      }
      console.log(falsePositive);
      if(!falsePositive){
        // Cálculo de validação do CPF
        let i = 10; let j = i + 1;
        let firstVerifier = 0;
        let secondVerifier = 0;
        for (let digit of cpfArray){
          if (i != 1) { 
            firstVerifier += i * digit;
            i--;
          }
          if (j != 1) {
            secondVerifier += j * digit;
            j--;
          }
        }
        firstVerifier = (firstVerifier * 10) % 11;
        secondVerifier = (secondVerifier * 10) % 11;
        console.log(firstVerifier, secondVerifier);
        if (firstVerifier == cpfArray[9] && secondVerifier == cpfArray[10]){
          this.cpfIsValid = true;
        }
      } else {
        this.cpfIsValid = false;
      }
      
    } else {
      this.cpfIsValid = false;
    }
    console.log(this.cpfIsValid);
    return this.cpfIsValid;
  }
}
