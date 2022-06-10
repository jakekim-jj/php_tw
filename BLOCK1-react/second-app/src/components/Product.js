function Product(props){
    let Tax = props.productDetails.price * 0.1

    const showTax = (totalprice)=>{
        alert("You have to pay : $"+totalprice);
    }
    return(
        <>
            <h1>{props.productDetails.foodName}</h1>
            <ul>
                <li>Price : ${props.productDetails.price}</li>
                <li>This product is made from : {props.productDetails.country}</li>
                <li>This is : {props.productDetails.category}</li>
                <li>Price with TAX: $ {props.productDetails.price + Tax}</li>
                <button type="button" onClick={()=>showTax(props.productDetails.price + Tax)}> How much? </button>
            </ul>
        </>
    )
}
export default Product;