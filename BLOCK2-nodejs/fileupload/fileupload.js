var http = require('http');
var formidable = require('formidable');
var mv = require('mv');

http.createServer(function(req,res){
    if(req.url=='/fileupload'){
        var form = new formidable.IncomingForm();
        form.parse(req,function(err, fields, files){
            var oldpath = files.uploadelement.filepath;
            var newpath = './upload/'+files.uploadelement.originalFilename;

            var docoldpath = files.docupload.filepath;
            var docnewpath = './document/'+files.docupload.originalFilename;

            var mcoldpath = files.mcupload.filepath;
            var mcnewpath = './music/'+files.mcupload.originalFilename;
            
            mv(oldpath,newpath,function(err){
                if(err)throw err;
                mv(docoldpath,docnewpath,function(err){
                    if(err)throw err;
                    mv(mcoldpath,mcnewpath,function(err){
                        if(err)throw err;
                        res.writeHead(200,{'Content-Type':'text/hmtl'});
                        res.write('Both Files uploaded!');
                        res.end();
                    });
                });
            });
        })
    }else{
        // res.writeHead(200,{'Content-type':'text/html'});
        // res.write('<form action="fileupload" method="POST" enctype="multipart/form-data">');
        // res.write('<input type="file" name="uploadelement"/><br/>');
        // res.write('<input type="submit" />');
        // res.write('</form>');
        return res.end();
    }
}).listen(8080);