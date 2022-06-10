const { ifError } = require('assert');
var http = require('http');
var mysql = require('mysql');
var formidable =require('formidable');

var con = mysql.createConnection({
    host:"localhost",
    // host:"192.168.64.4",
    user:"root",
    password: "",
    database: "customers_db"
})

con.connect(function(err){
    if(err) throw err;
    console.log('connected');
});

function selectFrom_customer_tb(customerid){
    var selectquery = "SELECT * FROM customer_tb WHERE customerid=?";
    // var output ="";
    con.query(selectquery,[customerid],function(err,result){
        if(err) throw err;
        console.log(result);
        // console.log(JSON.stringify(result));
        // return JSON.stringify(result);
        // output = JSON.stringify(result); 
    })
    // return output;
};

function deleteFrom_customer_tb(customerid){
    var deletequery = "DELETE FROM customer_tb WHERE customerid=?";
    con.query(deletequery,[customerid],function(err,result){
        if(err) throw err;
        console.log(result);
    })
}

http.createServer(function(req,res){

    // switch(req.rul){
    //     case "/read":
    //         selectFrom_customer_tb(13);
    //         break;
    //     case "/delete":
    //         deleteFrom_customer_tb(14);
    //         break;

    // }
    if(req.url=="/read"){
        // selectFrom_customer_tb();
        selectFrom_customer_tb(1);
        // console.log(selectFrom_customer_tb());
    }

    if(req.url=="/delete"){
        // selectFrom_customer_tb();
        deleteFrom_customer_tb(2);
        // console.log(selectFrom_customer_tb());
    }
    res.writeHead(200,{'Content-Type':'text/html'});
    res.write("Connected__");
    res.end();

}).listen(8080);