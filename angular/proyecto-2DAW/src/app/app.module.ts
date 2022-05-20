import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule, routingComponents } from './app-routing.module';
import { AppComponent } from './app.component';
import { HeaderComponent } from './plantillas/header/header.component';
import { LoginComponent } from './vistas/login/login.component';
import { FooterComponent } from './plantillas/footer/footer.component';
import { ProductoRecomendadoComponent } from './plantillas/producto-recomendado/producto-recomendado.component';
import { HttpClientModule } from '@angular/common/http';
// import { PaginaPrincipalComponent } from './vistas/pagina-principal/pagina-principal.component';
// import { ProductoComponent } from './plantillas/producto/producto.component';

import { ReactiveFormsModule, FormsModule } from '@angular/forms';

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    LoginComponent,
    routingComponents,
    FooterComponent,
    ProductoRecomendadoComponent
    // PaginaPrincipalComponent,
    // ProductoComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    ReactiveFormsModule,
    FormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
