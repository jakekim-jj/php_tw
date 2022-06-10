import {Outlet, Link} from "react-router-dom";
function Layout(){
    return(
        <>
            <nav>
                <ul>
                    <li> <Link to="/">Home</Link> </li>
                    <li> <Link to="/Jake">Jake</Link> </li>
                    <li> <Link to="/Peilun">Peilun</Link> </li>
                    <li> <Link to="/Roy">Roy</Link> </li>
                </ul>
            </nav>
            <Outlet/>
        </>
    )
}
export default Layout;