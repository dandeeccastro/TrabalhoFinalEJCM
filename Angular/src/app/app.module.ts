import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';

import { MaterializeModule } from 'angular2-materialize';
import { FormsModule } from '@angular/forms';

/* COMPONENTS */
import { NavbarComponent } from './navbar/navbar.component';
import { FooterComponent } from './footer/footer.component';
import { ParceriaComponent } from './pages/parceria/parceria.component';
import { HomeComponent } from './pages/home/home.component';
import { DisplayJogosComponent } from './pages/home/display-jogos/display-jogos.component';
import { SobreComponent } from './pages/sobre/sobre.component';
import { CadastroComponent } from './pages/cadastro/cadastro.component';
import { JogadorComponent } from './pages/cadastro/jogador/jogador.component';
import { DesenvolvedorComponent } from './pages/cadastro/desenvolvedor/desenvolvedor.component';
import { UsuarioComponent } from './pages/cadastro/usuario/usuario.component';
import { LoginComponent } from './pages/login/login.component';
import { JogosComponent } from './pages/jogos/jogos.component';
import { CadastrojogoComponent } from './pages/cadastrojogo/cadastrojogo.component';
import { PesquisaComponent } from './pages/pesquisa/pesquisa.component';
import { EditarComponent } from './pages/editar/editar.component';
import { EditdesenComponent } from './pages/editar/editdesen/editdesen.component';
import { EditjogadorComponent } from './pages/editar/editjogador/editjogador.component';
import { EditjogoComponent } from './pages/editar/editjogo/editjogo.component';

/* SERVICES E AFINS */
import { HttpClientModule } from '@angular/common/http';
import { PesquisaService } from './service/pesquisa.service';



@NgModule({
  declarations: [
	AppComponent,
	NavbarComponent,
	FooterComponent,
	ParceriaComponent,
	HomeComponent,
	DisplayJogosComponent,
	SobreComponent,
	CadastroComponent,
	JogadorComponent,
	DesenvolvedorComponent,
	UsuarioComponent,
	LoginComponent,
	JogosComponent,
	PesquisaComponent,
	CadastrojogoComponent,
	EditarComponent,
	EditdesenComponent,
	EditjogadorComponent,
	EditjogoComponent
  ],
  imports: [
  	BrowserModule,
	AppRoutingModule,
	MaterializeModule,
	HttpClientModule,
	FormsModule
  ],
  providers: [
	HttpClientModule,
	PesquisaComponent
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
