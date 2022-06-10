import React, {useState} from "react";
import ReactDOM from "react-dom";

function MyEye(){
    const [color, setColor] = useState("black");
    const [num, setNum] = useState(0);

    return (
        <section style={{textAlign:'center'}}>
            <h2>Lens' color : {color}</h2>
            <button type="button" onClick={()=>setColor("red")}>Red</button><br/>
            <button type="button" onClick={()=>setColor("Blue")}>Blue</button><br/>
            <button type="button" onClick={()=>setColor("Brown")}>Brown</button><br/>

            <button type="button" onClick={()=>setNum(num+1)}>increase</button>
            <button type="button" onClick={()=>setNum(num-1)}>decrease</button>
            <h2>{num}</h2>
        </section>
    )
}

export default MyEye;