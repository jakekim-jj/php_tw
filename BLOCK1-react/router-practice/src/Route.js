import ReactDOM from "react-dom/client";
import {BrowserRouter, Routes, Route} from "react-router-dom";
import Home from "./Pages/Home";
import Layout from "./Pages/Layout";
import Jake from "./Pages/Jake";
import Peilun from "./Pages/Peilun";
import Roy from "./Pages/Roy";
import NoPage from "./Pages/NoPage";

function RouteLayout(){
    return(
        <BrowserRouter>
            <Routes>
                <Route path="/" element={<Layout/>} >
                    <Route index element={<Home/>}/>
                    <Route path="Jake" element={<Jake/>}/>
                    <Route path="Peilun" element={<Peilun/>}/>
                    <Route path="Roy" element={<Roy/>}/>
                    <Route path="*" element={<NoPage/>}/>
                </Route>
            </Routes>
        </BrowserRouter>
    )
}

export default RouteLayout;