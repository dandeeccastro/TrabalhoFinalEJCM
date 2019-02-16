import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';

import { MaterializeModule } from 'angular2-materialize';

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
import { PesquisaComponent } from './pages/pesquisa/pesquisa.component';

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
	PesquisaComponent
  ],
  imports: [
    BrowserModule,
	AppRoutingModule,
	MaterializeModule,
	HttpClientModule
  ],
  providers: [
		HttpClientModule,
		PesquisaComponent
	],
  bootstrap: [AppComponent]
})
export class AppModule { }
