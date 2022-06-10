function Failed(){
    return <h1>You have failed</h1>
}

function Passed(){
    return <h1>You have passed</h1>
}

function PassDetect(props){
    let isPass = false;

    if(props.mark > 80) isPass = true;
    else isPass = false;
    return (
        <>
            {props.mark > 60 ? <Passed/> : <Failed/>}
        </>
    )
}

export default PassDetect;