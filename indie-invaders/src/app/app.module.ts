import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';

import { MaterializeModule } from 'angular2-materialize';
import { NavbarComponent } from './navbar/navbar.component';
import { FooterComponent } from './footer/footer.component';
import { ParceriaComponent } from './pages/parceria/parceria.component';
import { HomeComponent } from './pages/home/home.component';
import { DisplayJogosComponent } from './pages/home/display-jogos/display-jogos.component';
import { SobreComponent } from './pages/sobre/sobre.component';
@NgModule({
  declarations: [
	AppComponent,
	NavbarComponent,
	FooterComponent,
	ParceriaComponent,
	HomeComponent,
	DisplayJogosComponent,
	SobreComponent
  ],
  imports: [
    BrowserModule,
	AppRoutingModule,
	MaterializeModule 
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
