import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ProductoRecomendadoComponent } from './producto-recomendado.component';

describe('ProductoRecomendadoComponent', () => {
  let component: ProductoRecomendadoComponent;
  let fixture: ComponentFixture<ProductoRecomendadoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ProductoRecomendadoComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(ProductoRecomendadoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
