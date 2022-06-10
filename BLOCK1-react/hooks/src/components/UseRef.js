import {useEffect, useRef, useState} from "react"
function UseRef(){
    const [inValue, setInValue] = useState("");
    const [txttype, settxtType] = useState("");
    const inputElement = useRef();
    const secondInput = useRef();
    const thirdInput = useRef();
    const prevValue = useRef("");

    const chPassword = (event) =>{
        if(txttype === "password"){
            settxtType("text");
            event.target.innerText = "Hide password";
        }
        else{
            settxtType("password");
            event.target.innerText = "Show password";
        }
    }

    const focusInput = () =>{
        inputElement.current.focus();
    }

    useEffect(()=>{
        prevValue.current = inValue;
    },[inValue])

    const chbck = (event) =>{
        event.target.style.backgroundColor="green";
    }

    const chwhite = (event) =>{
        event.target.style.backgroundColor="white";
    }

    const txtChange = (event) =>{
        setInValue(event.target.value);
        secondInput.current.disabled = "";
    }

    const checkbox_chk = (event) =>{
        if(event.target.checked == true){
            thirdInput.current.style.display = "inline";
        }else{
            thirdInput.current.style.display = "none";
        }
    }

    return(
        <>

            <input type={txttype} ref={inputElement} onFocus={txtChange} onBlur={chwhite} 
            onChange={(e)=>setInValue(e.target.value)}/>
            <input tyle="text" disabled ref={secondInput}/><br/>

            <input type="text" ref={thirdInput}/>
            show me<input type="checkbox" onChange={checkbox_chk}/>
            

            <input type={txttype} ref={inputElement} onFocus={chbck} onBlur={chwhite} 
            onChange={(e)=>setInValue(e.target.value)}/>


            <button onClick={focusInput}> Focus </button>
            <button type="button" onClick={chPassword}> Show Password</button>

            <h2> current value : {inValue}</h2>
            <h2> Prev value : {prevValue.current} </h2>
        </>
    )
}

export default UseRef;