import { Injectable } from '@angular/core';
import { Producto } from 'src/app/modelos/Producto';
import { HttpClient, HttpHeaders } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})

export class ProductoService {

  apiUrl = "http://localhost:8000/api/productos"


  constructor(
    private http:HttpClient
  ) {
    console.log('funciona')

   }

   getProductos() {
     let header = new HttpHeaders()
      .set('Type-content', 'aplication/json')

      return this.http.get(this.apiUrl, {
        headers: header
      });
   }
}
