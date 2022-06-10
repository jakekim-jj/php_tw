import {Outlet, Link} from "react-router-dom";
function Layout(){
    return (
        <>
            <nav>
                <ul>
                    <li> <Link to="/">First Page</Link> </li>
                    <li> <Link to="/Second">Second Page</Link> </li>
                </ul>
            </nav>
            <Outlet/>
        </>
    )
}
export default Layout;