import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { ListaProductosI } from 'src/app/modelos/listaProductos.interface';

@Injectable({
  providedIn: 'root'
})

export class ApiService {

  apiUrl = "http://localhost:8000/api/productos"


  constructor(
    private http:HttpClient
  ) {
    console.log('funciona')
   }

  //  getProductos() {
  //    let header = new HttpHeaders()
  //     .set('Type-content', 'aplication/json')

  //     return this.http.get(this.apiUrl, {
  //       headers: header
  //     });
  //  }

   getProducto(productoId: number):Observable<ListaProductosI[]> {
    let url = this.apiUrl + "/" + productoId;
    return this.http.get<ListaProductosI[]>(url);
   }
}
