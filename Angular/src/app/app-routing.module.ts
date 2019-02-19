import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { NavbarComponent } from './navbar/navbar.component';
/* PÁGINAS DO SITE */
import { ParceriaComponent } from './pages/parceria/parceria.component';
import { HomeComponent } from './pages/home/home.component';
import { SobreComponent } from './pages/sobre/sobre.component';
import { CadastroComponent } from './pages/cadastro/cadastro.component';
import { LoginComponent } from './pages/login/login.component';
import { JogosComponent } from './pages/jogos/jogos.component';
import { CadastrojogoComponent } from './pages/cadastrojogo/cadastrojogo.component';

import { PesquisaComponent } from './pages/pesquisa/pesquisa.component';
const routes: Routes = [
	{ path: 'parceria', component: ParceriaComponent },
	{ path: 'home' , component: HomeComponent },
	{ path: '', redirectTo: 'home', pathMatch: 'full' },
	{ path: 'sobre', component: SobreComponent},
	{ path: 'cadastro', component: CadastroComponent},
	{ path: 'login', component: LoginComponent},
	{ path: 'jogos', component: JogosComponent},
	{ path: 'cadastrojogo', component: CadastrojogoComponent},
	{ path: 'pesquisa', component: PesquisaComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})

export class AppRoutingModule { }
