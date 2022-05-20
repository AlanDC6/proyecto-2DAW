import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { ProductsingleComponent } from './productsingle/productsingle.component';
import { HomeComponent } from './home/home.component';
import { CartComponent } from './cart/cart.component';

import { CheckoutComponent } from './checkout/checkout.component';

import { ShopComponent } from './shop/shop.component';

import { DashboardComponent } from './dashboard/dashboard.component';

import { OrdersComponent } from './orders/orders.component';

import { LoginComponent } from './login/login.component';

import { SignupComponent } from './signup/signup.component';

import { ForgotPasswordComponent } from './forgot-password/forgot-password.component';

import { ProfileDetailsComponent } from './profile-details/profile-details.component';

import { AddressComponent } from './address/address.component';

import { EditAddressComponent } from './edit-address/edit-address.component';

const routes: Routes = [
  { path:"", component:HomeComponent },
  { path:"product-single", component:ProductsingleComponent },
  { path:"cart", component:CartComponent },
  { path:"checkout", component:CheckoutComponent },
  { path:"shop", component:ShopComponent },
  { path:"dashboard", component:DashboardComponent },
  { path:"order", component:OrdersComponent },
  { path:"login", component:LoginComponent },
  { path:"signup", component:SignupComponent },
  { path:"forgot-password", component:ForgotPasswordComponent },
  { path:"profile-details", component:ProfileDetailsComponent },
  { path:"address", component:AddressComponent },
  { path:"edit-address", component:EditAddressComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }