import {useState} from 'react';

function ProductForm(){
    const [name, setName] = useState('');
    return(
        <>
        <form>
            Enter your name:
            <input 
            type="text"
            onChange={(e)=>setName(e.target.value)}
            />
        </form>
        <h1>You have typed {name}</h1>
        </>
    )
}
export default ProductForm;