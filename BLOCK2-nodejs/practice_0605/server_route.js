var http = require('http');
var url = require('url');
var filesystem = require('fs');

http.createServer(function(req,res){
    var parsedURL = url.parse(req.url, true);
    var fileName = "";

    switch(parsedURL.pathname){
        case "/":
            fileName = "./home.html";
            break;
        case "/blogs":
            fileName = "./blogs.html";
            break;
        case "/contact":
            fileName = "./contact.html";
            break;
    }
    filesystem.readFile(fileName, function(err,data){
        if(err){
            res.writeHead(404, {'Content-Type':'text/html'});
            return res.end("404 not Found");
        }
        res.writeHead(200,{'Content-Type':'text/html'});
        res.write(data);
        return res.end();
    });
}).listen(8080)