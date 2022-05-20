import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { ProductoRecomendadoComponent } from './plantillas/producto-recomendado/producto-recomendado.component';
import { LoginComponent } from './vistas/login/login.component';
import { PaginaPrincipalComponent } from './vistas/pagina-principal/pagina-principal.component';


const routes: Routes = [
  { path:'', redirectTo:'pagina_principal', pathMatch:'full'},
  { path:'login', component:LoginComponent },
  { path:'pagina_principal', component:PaginaPrincipalComponent },
  { path:'producto_recomendado', component:ProductoRecomendadoComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
export const routingComponents = [LoginComponent, PaginaPrincipalComponent, ProductoRecomendadoComponent]
