<?php 
	require '../Usuario.php';
	require '../Lance.php';
	require '../Leilao.php';
	require '../Avaliador.php';

	class AvaliadorTest extends PHPUnit_Framework_TestCase
	{
		#######Ordem decrecente########
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

		#######Ordem aleatorio########
		public function testDeveAceitarLancesEmOrdemAleatorio()
		{
			$leilao = new leilao('Playstation 4');

			$renan = new Usuario('Renan');
			$caio = new Usuario('Caio');
			$yuri = new Usuario('Yuri');
			$joao = new Usuario('João');
			$laleska= new Usuario('Laleska');
			$joaozinho = new Usuario('Joãozinho');
			$felipe = new Usuario('Felipe');


			$leilao->propoe( new Lance($renan,400));
			$leilao->propoe( new Lance($felipe,475));
			$leilao->propoe( new Lance($caio,350));
			$leilao->propoe( new Lance($felipe,250));
			$leilao->propoe( new Lance($caio,150));
			$leilao->propoe( new Lance($yuri,175));
			$leilao->propoe( new Lance($laleska,120));
			$leilao->propoe( new Lance($joao,300));
			$leilao->propoe( new Lance($joaozinho,654));
			$leilao->propoe( new Lance($joao,390));
			$leilao->propoe( new Lance($joaozinho,450));
			$leilao->propoe( new Lance($felipe,700));
			$leilao->propoe( new Lance($yuri,639));
			$leilao->propoe( new Lance($felipe,444));

			
			$leloeiro = new Avaliador();
			$leloeiro->avalia($leilao);

			$maiorEsperado = 700;
			$menorEperado = 120;

			$this->assertEquals($maiorEsperado, $leloeiro->getMaiorLance());
			$this->assertEquals($menorEperado, $leloeiro->getMenorLance());
		}

		#######Ordem crecente########
		public function testDeveAceitarLancesEmOrdemCrescente()
		{
			$leilao = new leilao('Playstation 4');

			$renan = new Usuario('Renan');
			$caio = new Usuario('Caio');
			$felipe = new Usuario('Felipe');


			$leilao->propoe( new Lance($renan, 100));
			$leilao->propoe( new Lance($caio, 200));
			$leilao->propoe( new Lance($renan, 300));
			$leilao->propoe( new Lance($felipe,400));
			
			$leloeiro = new Avaliador();
			$leloeiro->avalia($leilao);

			$maiorEsperado = 400;
			$menorEperado = 100;

			$this->assertEquals($maiorEsperado, $leloeiro->getMaiorLance());
			$this->assertEquals($menorEperado, $leloeiro->getMenorLance());
		}

		public function testDeveCalcularAMedia() 
		{
			// cenario: 3 lances em ordem crescente
			$joao = new Usuario("Joao");
			$jose = new Usuario("José");
			$maria = new Usuario("Maria");

			$leilao = new Leilao("Playstation 3 Novo");

			$leilao->propoe(new Lance($maria,300.0));
			$leilao->propoe(new Lance($joao,400.0));
			$leilao->propoe(new Lance($jose,500.0));

			// executando a acao
			$leiloeiro = new Avaliador();
			$leiloeiro->avalia($leilao);

			// comparando a saida com o esperado
			$this->assertEquals(400, $leiloeiro->getMedia(), 0.0001);
		}

		public function testAceitaLeilaoComUmLance() 
		{

			$joao = new Usuario("Joao");

			$leilao = new Leilao("Playstation 3");

			$leilao->propoe(new Lance($joao,200));

			$leiloeiro = new Avaliador();
			$leiloeiro->avalia($leilao);

			$maiorEsperado = 200;
			$menorEsperado = 200;

			$this->assertEquals($leiloeiro->getMaiorLance(),$maiorEsperado);
			$this->assertEquals($leiloeiro->getMenorLance(),$menorEsperado);
		}

		public function testPegaOsTresMaiores() 
		{

			$joao = new Usuario("Joao");
			$renan = new Usuario("Renan");
			$felipe = new Usuario("Felipe");

			$leilao = new Leilao("Playstation 3");

			$leilao->propoe(new Lance($joao,250));
			$leilao->propoe(new Lance($renan,300));
			$leilao->propoe(new Lance($felipe,400));

			$leiloeiro = new Avaliador();
			$leiloeiro->avalia($leilao);

			$maiores = $leiloeiro->getTop3();
			$this->assertEquals(count($maiores),3);
			$this->assertEquals($maiores[0]->getValor(),400);
			$this->assertEquals($maiores[1]->getValor(),300);
			$this->assertEquals($maiores[2]->getValor(),250);
		}
	}
?>