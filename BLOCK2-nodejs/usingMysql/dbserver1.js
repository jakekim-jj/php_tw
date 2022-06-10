var http = require('http');
var mysql = require('mysql');

var con = mysql.createConnection({
    host:'localhost',
    // host:"192.168.64.4",
    user:"jake",
    password: "",
    database: "customers_db",
});


con.connect(function(err){
    if(err) throw err;
    console.log("Database connected!!!!");
});

function insertinto_Customer_tb(username,customername,phone,email){
    var sqlinsert = "INSERT INTO customer_tb (username, customername, phone, email) VALUES ('"+username+"','"+customername+"','"+phone+"','"+email+"')";

    con.query(sqlinsert,[username,customername,phone,email],function(err,result){
        if(err)throw err;
        console.log("1 record added");
        console.log(result);
    })
}

http.createServer(function(req,res){
    insertinto_Customer_tb("PPP","eilun", "121212","peipei@gmail.com");
    res.writeHead(200,{'Content-Type':'text/html'});
    res.write("Server Connected!!!");
    res.end();
}).listen(8080);