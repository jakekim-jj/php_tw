import { useState } from "react";
import $ from 'jquery';

function SelectUser(){
    const [result, setResult] = useState("");
    $.ajax({
        type:"GET",
        url:"",
        success(data){
            setResult(data)
        }
    });
    return(
        <select dangerouslySetInnerHTML={{__html:result}}>


        </select>
    )
}

export default SelectUser;