import {useState} from 'react';
import $ from 'jquery';
function ReigsterForm(){
    const [uname,setUname] = useState("");
    const [cName,setcName] = useState("");
    const [phone,setPhone] = useState("");
    const [email,setEmail] = useState("");
    const [output,setOutput] = useState("");

    const handleSubmit = (event) =>{
        event.preventDefault();
        const regForm = $(event.target);
        $.ajax({
            type:"POST",
            url : regForm.attr("Action"),
            data : regForm.serialize(),
            success(data){
                setOutput(data);
            }
        });
    }
    return(
        <>
            <form method="POST" action="http://192.168.64.3/ajax/register.php" onSubmit={(event)=>handleSubmit(event)}>
                <input type="text" name="username" value={uname} placeholder="username"
                onChange={(event)=>setUname(event.target.value)}/>
                <input type="text" name="customerName" value={cName} placeholder="customername"
                onChange={(event)=>setcName(event.target.value)}/>
                <input type="text" name="phone" value={phone} placeholder="phone"
                onChange={(event)=>setPhone(event.target.value)}/>
                <input type="text" name="email" value={email} placeholder="email"
                onChange={(event)=>setEmail(event.target.value)}/>
                <br/>
                <button type="submit">Register</button>
            </form>
            <h1>{output}</h1>
        </>
    )
}
export default ReigsterForm;