function CarImage(props){
    return(
        <h1>{props.ImgSrc}</h1>
    )
}
function Car(props){
    // props.CarDetails.CarName="BMW";
    props.CarDetails.CountryName="KOREA";

    const select = (carname,event) => {
        console.log(event.target);
        alert("You selected: "+carname);
    }
    return(
        <>
            <h1>{props.CarDetails.CarName}</h1>
            <ul>
                <li>Made In {props.CarDetails.CountryName}</li>
                <li>It was founded in {props.CarDetails.foundedYear}</li>
            </ul>
            <button type="button" onClick={(event)=>select(props.CarDetails.CarName,event)}>Select</button>
        </>
    )
}
export default Car;