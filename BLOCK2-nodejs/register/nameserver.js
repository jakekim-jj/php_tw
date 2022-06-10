var http= require('http');
var formidable =require('formidable');
const { parse } = require('path');
http.createServer(function(req,res){
    if(req.url=="/register"){
        var form = new formidable.IncomingForm();
        form.parse(req,function(err,fields){
            let firstname = fields.fname;
            let lastname = fields.lname;

            res.writeHead(200,{'Content-Type':'text/html'});
            res.write('Your firstname is '+firstname+' & lastname is '+lastname);
            return res.end();
        });
    }else{
        res.writeHead(200,{'Content-Type':'text/html'});
        res.write("No information");
        return res.end();
    }
}).listen(8080);