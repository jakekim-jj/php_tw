import { useState } from "react";
import $ from "jquery";

function Info(){
    const[name, setName] = useState("");
    const[result, setResult] = useState("");
    const[num1,setNum1] = useState("");
    const[num2,setNum2] = useState("");

    const handleSubmit = (event) =>{
        event.preventDefault();
        const form = $(event.target);
        $.ajax({
            type: "POST",
            url : form.attr("action"),
            data : form.serialize(),
            success(data){
                setResult(data);
            }
        });
    };

    return(
        <>
            <form action="http://192.168.64.2/ajax/server.php" method="POST" onSubmit={(event)=>handleSubmit(event)}>
                <input type="text" name="username" value={name} onChange={(event)=>setName(event.target.value)}/>
                <br/>
                <input type="numver" name="num1" value={num1} onChange={(event)=>setNum1(event.target.value)}/>
                <input type="numver" name="num2" value={num2} onChange={(event)=>setNum2(event.target.value)}/>
                <button type="submit">submit</button>
            </form>
            <h1>{result}</h1>
        </>
    )
}
export default Info;