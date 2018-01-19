var express = require('express');
var router = express.Router();
var bd = require('mysql');

var connection = bd.createConnection({
	host: "localhost",
	user: "root",
	password: "",
	database: "cadastro"
});

connection.connect(function(err) {
	if(err) {
		console.error('error connecting: ' + err.stack);
		return;
	}
	console.log('connected as id: ' + connection.threadID);
});

/* GET home page. */
router.get('/', function(req, res, next) {
	res.sendFile(__dirname + 'index.html');
});

router.get('/usuarios', function(req, res, next) {
	connection.query("SELECT * FROM usuarios", function(error, result, fields) {		
	console.log(result, "chamou");
	console.log(error);
	if(error){
		var json = {mensagem: "Email não encontrdo"};
		res.status('404').json(json);
	} else {
		res.status('200').json(result);
	}
	});
});

router.get('/test/:id', function(req, response, next) {
	console.log(req.params.id);
 	response.status('200');
});

router.post('/test2', function(req, response, next) {
	console.log(req.body, "Chamou de novo");
 	var json = {mensagem: "Email não encontrdo"};
 	response.status('200').json(json);
});

module.exports = router;