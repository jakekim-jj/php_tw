import React from 'react';
import ReactDOM from 'react-dom/client';
import NameForm from './components/Name';
import Car from './components/Car';
import Product from './components/Product';
import ProductForm from './components/ProductForm';
import reportWebVitals from './reportWebVitals';

const car1Details = {CarName:"Kia", CountryName:"Korea", foundedYear:"1994"};
const car2Details = {CarName:"Range Rover", CountryName:"United Kingdom", foundedYear:"1990"};

const product1Details = {foodName:"Kimchi", price:100, country:"Korea", category:"FOOD"};
const product2Details = {foodName:"Sake", price:150, country:"Japan", category:"DRINK"};
const product3Details = {foodName:"Poutine", price:20, country:"Canada", category:"FOOD"};
const product4Details = {foodName:"BubbleTea", price:5, country:"Taiwan", category:"DRINK"};

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
  <>
    <NameForm/>
    <Car CarDetails={car1Details}/>
    <Car CarDetails={car2Details}/>
    <ProductForm/>
    <Product productDetails={product1Details}/>
    <Product productDetails={product2Details}/>
    <Product productDetails={product3Details}/>
    <Product productDetails={product4Details}/>
  </>
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
