<?php 
	require '../Usuario.php';
	require '../Lance.php';
	require '../Leilao.php';
	require '../Avaliador.php';

	class AvaliadorTest extends PHPUnit_Framework_TestCase
	{
		public function testDeveAceitarLancesEmOrdemDecrecente()
		{
			$leilao = new leilao('Playstation 4');

			$renan = new Usuario('Renan');
			$caio = new Usuario('Caio');
			$felipe = new Usuario('Felipe');


			$leilao->propoe( new Lance($renan,400));
			$leilao->propoe( new Lance($caio,350));
			$leilao->propoe( new Lance($felipe,250));
			
			$leloeiro = new Avaliador();
			$leloeiro->avalia($leilao);

			$maiorEsperado = 400;
			$menorEperado = 250;

			$this->assertEquals($maiorEsperado, $leloeiro->getMaiorLance());
			$this->assertEquals($menorEperado, $leloeiro->getMenorLance());
		}

		public function testAvaliaMediaLeilao()
		{
			$leilao = new leilao('Fusca');

			$renan = new Usuario('Renan');
			$yuri = new Usuario('Yuri');
			$felipe = new Usuario('Felipe');
			$gabriel = new Usuario('Gaybriel');


			$leilao->propoe( new Lance($renan,1200));
			$leilao->propoe( new Lance($yuri,1100));
			$leilao->propoe( new Lance($felipe,2000));
			$leilao->propoe( new Lance($gabriel,2200));
			
			$leloeiro = new Avaliador();
			

			$valorEsperdo = 1625;
			$this->assertEquals($valorEsperdo,$leloeiro->avaliaMedia($leilao));
		}




	}


?>