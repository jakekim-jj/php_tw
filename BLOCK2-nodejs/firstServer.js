const { read } = require('fs');
var http = require('http');
var url = require('url');
var filesystem = require('fs');

http.createServer(function(req,res){
    res.writeHead(200, {'content-Type':'text/html'});
    var parsedURL = url.parse(req.url,true);
    // res.write("host:"+ parsedURL.host);
    // res.write("hostname:"+ parsedURL.hostname);
    // res.write("hostname:"+ parsedURL.pathname);
    res.write("query string:"+ parsedURL.search);

    var querystring = parsedURL.query;
    // res.write("username value:"+querystring.username);

    var firstName = parsedURL.query;
    res.write("firstName is "+querystring.firstname);

    var familyName = parsedURL.query;
    res.write("familyName is "+querystring.familyname);
    // res.end("HELLO WORLD JAKE");
    res.end();
}).listen(8080);