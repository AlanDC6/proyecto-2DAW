import { Component, OnInit } from '@angular/core';
import { ProductoService } from 'src/app/servicios/producto/producto.service';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { ApiService } from 'src/app/servicios/api/api.service';

@Component({
  selector: 'app-producto-recomendado',
  templateUrl: './producto-recomendado.component.html',
  styleUrls: ['./producto-recomendado.component.css']
})
export class ProductoRecomendadoComponent implements OnInit {

  

  constructor(
    private api:ApiService
  ) { 
    
    }
  

  ngOnInit(): void {
    this.api.getProducto(1).subscribe(data => {
      console.log(data)
    } )
  }

}
