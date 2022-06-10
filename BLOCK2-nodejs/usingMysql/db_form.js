var http = require('http');
var mysql = require('mysql');
var formidable =require('formidable');

var dbcon = mysql.createConnection({
    host :'localhost',
    user:'root',
    password:"",
    database:"customers_db"
});

dbcon.connect(function(err) {
    if(err)throw err;
    console.log("DB customer_db connected!!");
});

http.createServer(function(req,res){
    if(req.url=="/read"){
        var form = new formidable.IncomingForm();
        form.parse(req,function(err,fields){
            let cus_id = fields.wantread;

            function select_cus_id(customerid){
                var selectquery = "SELECT * FROM customer_tb WHERE customerid=?";
                dbcon.query(selectquery, [customerid], function(err,result){
                    if(err) throw err;
                    console.log(result);
                })
            };
            select_cus_id(cus_id);
            res.writeHead(200,{'Content-type':'text/html'});
            console.log(result);
            res.write("selected id is "+cus_id);
            res.end();

        });
        
    }

    if(req.url=="/delete"){
        var delete_form = new formidable.IncomingForm();
        delete_form.parse(req,function(err,fields){
            let del_id = fields.wantdelete;

            function delete_cus_id(customerid){
                var deletequery = "DELETE FROM customer_tb WHERE customerid=?";
                dbcon.query(deletequery, [customerid], function(err,result){
                    if(err) throw err;
                    console.log(result);
                })
            };
            delete_cus_id(del_id);
            res.writeHead(200,{'Content-type':'text/html'});
            res.write("customer id "+del_id+"is deleted");
            res.end();

        })

    }
    if(req.url=="/insert"){
        var insert_form = new formidable.IncomingForm();
        insert_form.parse(req,function(err,fields){
            let username = fields.Uname;
            let customername = fields.Cname;
            let phone = fields.phone;
            let email = fields.email;

            function insert_cus(username, customername, phone, email){
                var insertquery = "INSERT INTO customer_tb (username, customername, phone, email) VALUES (?,?,?,?) ";

                dbcon.query(insertquery,[username, customername,phone,email], function(err, result){
                    if(err) throw err;
                    console.log("1recode addddded");
                })
            }

            insert_cus(username,customername,phone,email);
            res.writeHead(200,{'Content-type':'text/html'});
            res.write("Customer added");
            res.end();

        })
    }

    if(req.url=="/update"){
        var update_form = new formidable.IncomingForm();
        update_form.parse(req,function(err,fields){
            let up_id = fields.wantupdate;
            let username = fields.Uname;
            let customername = fields.Cname;

            function update_cus(username, customername,up_id){
                var updatequery = "UPDATE customer_tb SET username=?, customername=? WHERE customerid=? ";

                dbcon.query(updatequery,[username, customername,up_id], function(err, result){
                    if(err) throw err;
                    console.log("record updated");
                })
            }

            update_cus(username,customername,up_id);
            res.writeHead(200,{'Content-type':'text/html'});
            res.write("Customer updated");
            res.end();

        })
    }
    else{
        res.writeHead(200,{'Content-Type':'text/html'});
        res.write("No customerID");
        return res.end();
    }

}).listen(8080);
