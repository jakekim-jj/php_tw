import ReactDOM from "react-dom/client";
import {BrowserRouter, Routes, Route} from "react-router-dom";
import Layout from "./Pages/Layout";
import First from "./Pages/First";
import Second from "./Pages/Second";

function RouteLayout(){
    return(
        <BrowserRouter>
            <Routes>
                <Route path="/" element={<Layout/>}>
                    <Route index element={<First/>}/>
                    <Route path="Second" element={<Second/>}/>
                </Route>
            </Routes>
        </BrowserRouter>
    )
}

export default RouteLayout;