import {Outlet, Link} from "react-router-dom";
function Layout(){
    return (
        <>
            <nav>
                <ul>
                    <li> <Link to="/">Home</Link> </li>
                    <li> <Link to="/singer">Q2-singer</Link> </li>
                    <li> <Link to="/test">Q3-test</Link> </li>
                </ul>
            </nav>
            <Outlet/>
        </>
    )
}
export default Layout;