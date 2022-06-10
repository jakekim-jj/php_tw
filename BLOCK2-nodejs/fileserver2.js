var http = require('http');
var url = require('url');
var filesystem = require('fs');

http.createServer(function(req,res){
    var parsedURL = url.parse(req.url,true);
    var query = parsedURL.query;
    var content = query.text;
    filesystem.appendFile('./text.txt',content,function(err){
        if(err) throw err;
        return res.end("file saved!");
    })
}).listen(8080);