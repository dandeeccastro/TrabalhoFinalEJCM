import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { NavbarComponent } from './navbar/navbar.component';
/* PÁGINAS DO SITE */
import { ParceriaComponent } from './pages/parceria/parceria.component';
import { HomeComponent } from './pages/home/home.component';
import { SobreComponent } from './pages/sobre/sobre.component';
import { CadastroComponent } from './pages/cadastro/cadastro.component';
import { LoginComponent } from './pages/login/login.component';

const routes: Routes = [
	{ path: 'parceria', component: ParceriaComponent },
	{ path: 'home' , component: HomeComponent },
	{ path: '', redirectTo: 'home', pathMatch: 'full' },
	{ path: 'sobre', component: SobreComponent},
	{ path: 'cadastro', component: CadastroComponent},
	{ path: 'login', component: LoginComponent},
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
