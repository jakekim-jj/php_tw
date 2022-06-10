import React from 'react';
import ReactDOM from 'react-dom/client';
import reportWebVitals from './reportWebVitals';
import PassDetect from './components/PassDetect';
import Marks from './components/Marks';
import CourseForm from './components/CourseForm';

const root = ReactDOM.createRoot(document.getElementById('root'));

let marks = [40,50,80,12,13,14,15,266];

root.render(
  <>
    <CourseForm />
  </>

);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
