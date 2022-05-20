export class Producto {
    id!: number;
    titulo: string;
    descripcion: string;
    categoria_prenda: string;
    marca: string;
    precio: number;
    
    constructor(t: string, d: string, c: string, m: string, p: number) {
        this.titulo = t;
        this.descripcion = d;
        this.categoria_prenda = c;
        this.marca = m;
        this.precio = p;
    }
}