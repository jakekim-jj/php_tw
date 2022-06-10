import {Outlet, Link} from "react-router-dom";
function Layout(){
    return(
        <>
            <nav>
                <ul>
                    <li><Link to="/">Welcome Page</Link></li>
                    <li><Link to="/Employee">Employee Page</Link></li>
                </ul>
            </nav>
            <Outlet />
        </>
    )
}
export default Layout;