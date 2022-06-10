import ReactDOM from "react-dom/client";
import {BrowserRouter, Routes, Route} from "react-router-dom";
import Layout from "./Components/Layout";
import List from "./Components/List";
import Employee from "./Components/Employee";

function RouteLayoyt(){
    return(
        <BrowserRouter>
            <Routes>
                <Route path="/" element={<Layout/>}>
                    <Route index element={<List/>}/>
                    <Route path="Employee" element={<Employee/>}/>

                </Route>
            </Routes>
        </BrowserRouter>
    )
}
export default RouteLayoyt;