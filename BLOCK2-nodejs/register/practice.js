var http = require('http'); // create server
var formidable = require('formidable'); // access form elements
var mv = require('mv');

http.createServer(function(req,res){
    //from particular pathname
    if(req.url=="/file"){
        //using Incomingform() to open and read the contents of the form 
        var form = new formidable.IncomingForm();
        //after that we use callback function to do something.
        form.parse(req,function(err,fields,files){
            // let name = fields."html's name of element"
            let fileName = fields.fname;
            // to upload file to server / we need temporary place 
            //files."html's name of element"
            let oldpath = files.uploadfile.filepath;
            // need upload folder which we have to upload
            let newpath = './upload/'+fileName;

            mv(oldpath,newpath,function(err){
                if(err) throw err;
                res.writeHead(200,{'Content-Type':'text/html'});
                res.write(fileName+ ' uploaded');
                return res.end()
            })
        });

    }else{
        res.writeHead(200,{'Content-Type':'text/html'});
        res.write("No Information found");
        return res.end();
    }

}).listen(8080); // server listen/respond to 8080