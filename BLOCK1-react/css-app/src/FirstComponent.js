import './styles/style.css';
import cssClasses from './styles/CssClasses.module.css';
import './styles/mySass.scss';

const FirstComponent = () =>{
    const testClass = {
        color : "yellowgreen",
        backgroundColor : "grey",
        padding:"10px",
        cursor:"pointer",
        border: "3px solid blue"
    }
    
    const paraClass ={
        padding:"2%",
        margin:"2%",
        color:"white",
        backgroundColor:"black",
        fontSize:"25px"
    }
    return(
        <>
            <h2 style={{color:"red", backgroundColor:"lightblue", padding:"2%"}}> 
            Just a Test </h2>
            <h2 style={testClass}> Without CSS</h2>
            <p style={paraClass}> This is a Paragraph</p>
            <button type='button'>Test Button</button>
            <a class="anchor" href=""> This Is Anchor</a>

            <a class={cssClasses.btn}>Test link</a>
            <h1 class={cssClasses.testClass}>This is just a TEST</h1>

            <h1 class="heading">This is just simple heading</h1>
            <h2>Test heading 2</h2>
        </>
    )
}
export default FirstComponent;