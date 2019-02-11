import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { NavbarComponent } from './navbar/navbar.component';
import { ParceriaComponent } from './pages/parceria/parceria.component';
import { HomeComponent } from './pages/home/home.component';
const routes: Routes = [
	{ path: 'parceria', component: ParceriaComponent },
	{ path: 'home' , component: HomeComponent },
	{ path: '', redirectTo: 'home', pathMatch: 'full' }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
