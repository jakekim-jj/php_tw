var http = require('http');
var url = require('url');

http.createServer(function(req,res){
    res.writeHead(200,{'content-Type':'text/html'});
    var parsedURL = url.parse(req.url,true);
    var querystring = parsedURL.query;

    if(querystring.name==null || querystring.model==null){
        res.write("No DATA!!");
    }
    else{
    
    res.write("Your car name is:"+querystring.name);
    res.write("Your car model is:"+querystring.model);
    res.end();
    }

}).listen(8080);