import {useState} from 'react';

function NameForm(){

    const [fName, setfName] = useState('');
    const [lName, setlName] = useState('');

    const select = (fName, lName) => {
        alert("Your firstname :"+ fName+ "Your LastName : " + lName);
    }
    return(
        <>
            Enter your first name:
            <input 
            type="text" 
            onChange={(e)=>setfName(e.target.value)}
            />

            Enter your Last name:
            <input 
            type="text" 
            onChange={(e)=>setlName(e.target.value)}
            />

            <button type="button" onClick={(e)=>select(fName, lName)}>Show Name</button>
        
        </>
    )
}
export default NameForm;