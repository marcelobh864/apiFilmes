<?php 
	echo "<meta HTTP-EQUIV='refresh' CONTENT='4;URL=projeto.php'>";
	$paginas = rand(1,12);
	$url = "https://api.themoviedb.org/3/movie/popular?api_key=7467198c8042ec845a1b4b403d3a293a&language=en-US&page=".$paginas;
	$filmes = json_decode(file_get_contents($url));
	$rand = rand(1,18);
	$titulo = $filmes->results[$rand]->title;
	$quantidadeVotos = $filmes->results[$rand]->vote_count;
	$descricaoFilme = $filmes->results[$rand]->overview;
	

?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<style type="text/css">
			body{
				background-image: url("cinema100.jpg");
			    background-size: cover;  
			    background-attachment:  fixed;
			    background-position: center;
			    background-repeat: no-repeat;
			}
			
			#dados{
				margin-top: 90px;
				margin-left: 150px;
				width: 400px;
				height: 420px;
  				padding-left: 330px;
			}
			#dados h1{
				margin-bottom: 30px;
				color: #FF0000;
				text-align: center;
			}
			#dados h3{
				color: #FF4500;
			}
			#dados p{
				color: #FFFFFF;
				font-weight: bold;
			}
		</style>
	</head>
	<body>
		<div id="dados">
			<h1>Filmes mais populares do ano de 2019</h1>
			<h3>Nome do filme: </h3>
			<p><?php echo $titulo; ?></p>
			<h3>Votos que o filme recebeu </h3>
			<p><?php echo $quantidadeVotos; ?></p>
			<h3>Descrição do filme </h3>
			<p><?php echo $descricaoFilme; ?></p>
		</div>
		<!-- <script type="text/javascript">
			function atualiza(){
				var page = "projeto.php";
				$.ajax
				//randomico = Math.floor(Math.random() * 20);
						({
							type: 'POST',
							dataType: 'html',
							url: projeto.php,
							//data:{'randomico': randomico},
							success: function (msg){
								$("#dados").html(msg);
							}
						})
						
			}
		</script> -->
	</body>
</html>