<?php 
	echo "<meta HTTP-EQUIV='refresh' CONTENT='4;URL=projeto.php'>";
	$paginas = rand(1,50);
	$url = "https://api.themoviedb.org/3/movie/popular?api_key=7467198c8042ec845a1b4b403d3a293a&language=en-US&page=".$paginas;
	$filmes = json_decode(file_get_contents($url));
	function data($data){
    	return date("d/m/Y", strtotime($data));
	}
	$rand = rand(0,19);
	$titulo = $filmes->results[$rand]->title;
	$quantidadeVotos = $filmes->results[$rand]->vote_count;
	$descricaoFilme = $filmes->results[$rand]->overview;
	$mediaVotosFilme = $filmes->results[$rand]->vote_average;
	$dataLancamentoFilme = data($filmes->results[$rand]->release_date);
	$imagemFilme = $filmes->results[$rand]->poster_path;
	$img = "https://image.tmdb.org/t/p/w500".$imagemFilme;
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
				margin-top: 40px;
				margin-right: 5%;
				width: 30%;
				height: 420px;
  				padding-left: 18%;
			}
			#dados h1{
				margin-bottom: 30px;
				color: #FF0000;
				text-align: center;
				margin-top: -5px;
				font-size: 2em;
			}
			#dados h3{
				color: #FF4500;
				margin-top: -3px;
				font-size: 1.4em;
			}
			#dados p{
				color: #FFFFFF;
				font-weight: bold;
				margin-top: -3px;
				font-size: 16;
			}
			.fonte{
				font-size: 16;
				font-weight: bold;
				color: #FFFFFF;
			}
			#imagem{
				margin-top: -445px;
				float: left;
  				padding-left: 58%;
			}
		</style>
	</head>
	<body>
		<div>
			<h1 style="color: #FF0000;"><center>Filmes mais populares do ano<br> de 2019</center></h1>
		</div>
		<div id="dados">
			<h3>Nome do filme: <span class="fonte"><?php echo $titulo; ?></span></h3>
			<h3>Data lançamento do filme: <span class="fonte"><?php echo $dataLancamentoFilme; ?></span></h3>
			<h3>Votos que o filme recebeu: <span class="fonte"><?php echo $quantidadeVotos; ?></span></h3>
			<h3>Pontuação média do filme:  <span class="fonte"><?php echo $mediaVotosFilme; ?></span></h3>
			<h3>Descrição do filme: </h3>
			<p><?php echo $descricaoFilme; ?></p>
			
		</div>
		<div id="imagem">
			<h3 style="margin-left: 20%; font-size: 1.4em; font-weight: bold; color: #FF0000;">Poster do filme</h3>
			<p><img height="45%" width="75%" alt="Filme sem Banner" src="<?php echo $img; ?>" ></p>
		</div>
	</body>
</html>