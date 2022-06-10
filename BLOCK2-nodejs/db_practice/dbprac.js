var http = require('http');
var mysql = require('mysql');
var formidable = require('formidable');

var dbcon = mysql.createConnection({
    host:"localhost",
    user:"root",
    password:"",
    database:"music_db"
})

dbcon.connect(function(err){
    if(err) throw err;
    console.log("DB music_db connected!!");
})

http.createServer(function(req,res){
    var form = new formidable.IncomingForm();
    if(req.url=="/insert"){
        form.parse(req,function(err,fields){
            let cm_name = fields.composer;
            let gr_name = fields.genre;
            let age = fields.age;

            function insert_music(composer,genre,age){
                var insertquery = "INSERT INTO music_tb (composer,genre,age) VALUE(?,?,?)";
                dbcon.query(insertquery,[composer,genre,age],function(err, result){
                    if(err) throw err;
                    console.log("New composer added!!");
                })
            }
            insert_music(cm_name, gr_name, age);
            res.writeHead(200,{'Content-Type':'text/html'});
            res.write("Customer added");
            res.end();

        })
    }
    if(req.url=="/update"){
        form.parse(req,function(err,fields){
            let musicid = fields.update;
            let genre = fields.genre;
            let age = fields.age;

            function update_music(genre, age,musicid){
                var updatequery = "UPDATE music_tb SET genre=?, age=? WHERE musicid=?";

                dbcon.query(updatequery,[genre, age,musicid], function(err,result){
                    if(err) throw err;
                    console.log("recode updated!!");
                })
            }
            update_music(genre, age, musicid);
            res.writeHead(200,{'Content-Type':'text/html'});
            res.write("Music Updated!!");
            res.end();
        })
    }

    if(req.url=="/delete"){
        form.parse(req,function(err,fields){
            let musicid = fields.delete;

            function del_music(musicid){
                var deletequery = "DELETE FROM music_tb WHERE musicid=?";
                dbcon.query(deletequery,[musicid], function(err,result){
                    if(err) throw err;
                    console.log("record deleted!!");
                })
            }
            del_music(musicid);
            res.writeHead(200,{'Content-Type':'text/html'});
            res.write("Music Deleted!!");
            res.end();
        })
    }

}).listen(8080);