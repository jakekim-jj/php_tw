import {useState} from "react"


function AddProduct(props){
    return(
            <tr>
                <td>{props.product.productName}</td> 
                <td>${props.product.productPrice} </td>
                <td>{props.product.productQuantity}</td>
                <td>${props.product.productPrice * props.product.productQuantity}</td>
            </tr>
    ) 
}

function ProductDisplay(props){
    let sum =0;
    props.products.map(
        (product) =>{
            sum += product.productPrice * product.productQuantity * 1.12;
        }
    )
    return(
        <>
            <h2> Total amount of the bill : {sum}</h2>
            <table border="1">
                <tr>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Quantity</th>
                    <th>Total Price</th>
                </tr>
                    {props.products.map( (product)=> <AddProduct key = {product.productName}
                    product={product}/>)}
            </table>         
            
        </>
    )
}

function Second(props){

    const chbck_name = (event) =>{
        event.target.style.backgroundColor="yellow";
    }
    const chbck_price = (event) =>{
        event.target.style.backgroundColor="blue";
    }
    const chbck_quantity = (event) =>{
        event.target.style.backgroundColor="brown";
    }
    const chwhite = (event) =>{
        event.target.style.backgroundColor="white";
    }

    let products = [];
    let counter = 0;

    const [productName, SetName] = useState("");
    const [productPrice, SetPrice] = useState("");
    const [productQuantity, SetQuantity] = useState("");
    const [productList, SetProductList] = useState([]);

    const product_adder = () => {
        let productObj = { productName:productName, productPrice:productPrice, productQuantity:productQuantity};
        products = productList;
        products.push(productObj);

        SetProductList(products);
        SetName("");
        SetPrice("");
        SetQuantity("");
    }

    // props.products.map(
    //     (product) =>{
    //         counter++;
    //     }
    // )


    return(
        <>
            <h1> This Is Second Page</h1>
            <input type="text" onFocus={chbck_name} onBlur={chwhite} value={productName}
            onChange={(e)=>SetName(e.target.value)} placeholder="Product Name"/> 
            Name of Product <br/>
            <input type="text" onFocus={chbck_price} onBlur={chwhite} value={productPrice}
            onChange={(e)=>SetPrice(e.target.value)} placeholder="Product Price"/> 
            Price of Product <br/>
            <input type="text" onFocus={chbck_quantity} onBlur={chwhite} value={productQuantity}
            onChange={(e)=>SetQuantity(e.target.value)} placeholder="Product Quantity"/> 
            Quantity of Product <br/>


            <button type="button" onClick={product_adder}>Submit</button>

            {/* {props.products.map( (course)=> <ProductDisplay key = {products.productName}
                productName={productName}/>)} */}

            <ul>
                <ProductDisplay products = {productList}/>
            </ul>
            

        

        </>
    )

}
export default Second;