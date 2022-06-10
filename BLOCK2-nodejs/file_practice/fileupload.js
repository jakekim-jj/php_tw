var http = require('http');
var formidable = require('formidable');
var mv = require('mv');

http.createServer(function(req,res){
    if(req.url=='/fileupload'){
        var form = new formidable.IncomingForm();
        form.parse(req,function(err,fields,files){
            let fileName = fields.wantfile;

            let oldpath = files.uploadfile.filepath;
            let newpath = './files/'+fileName;


            mv(oldpath, newpath, function(err){
                if(err) throw err;
                res.writeHead(200,{'Content-Type':'text/html'});
                res.write("file uploaded!!");
                res.end();
            });
        });
    }
}).listen(8080);