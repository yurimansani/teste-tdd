<?php
	require '../Usuario.php';
	require '../Lance.php';
	require '../Leilao.php';
	require '../Avaliador.php';
	require '../FiltroDeLances.php';

	class FiltroDeLancesTest extends PHPUnit_Framework_TestCase 
	{

		public function testDeveSelecionarLancesEntre1000E3000() 
		{
			$joao = new Usuario("Joao");

			$filtro = new FiltroDeLances();
			$lances = [];
			$lances[] = new Lance($joao,2000);
			$lances[] = new Lance($joao,1000);
			$lances[] = new Lance($joao,3000);
			$lances[] = new Lance($joao,800);

			$resultado = $filtro->filtra($lances);

			$this->assertEquals(1, count($resultado));
			$this->assertEquals(2000, $resultado[0]->getValor());
		}

		public function testDeveSelecionarLancesEntre500E700() 
		{
			$joao = new Usuario("Joao");

			$filtro = new FiltroDeLances();
			$lances = [];
			$lances[] = new Lance($joao,600);
			$lances[] = new Lance($joao,500);
			$lances[] = new Lance($joao,700);
			$lances[] = new Lance($joao,800);

			$resultado = $filtro->filtra($lances);
			$this->assertEquals(1, count($resultado));
			$this->assertEquals(600, $resultado[0]->getValor());
		}

		public function testDeveSelecionarLancesMaioresQue5000() 
		{
			$yuri = new Usuario("Yuri");

			$filtro = new FiltroDeLances();

			$lances = [];
			$lances[] = new Lance($yuri, 10000);
			$lances[] = new Lance($yuri, 800);

			$resultado = $filtro->filtra($lances);

			$this->assertEquals(1, count($resultado));
			$this->assertEquals(10000, $resultado[0]->getValor(), 0.00001);
		}

		public function testExcluiMenor500()
		{
			$yuri = new Usuario("Yuri");

			$filtro = new FiltroDeLances();

			$lances = [];
			$lances[] = new Lance($yuri, 400);
			$lances[] = new Lance($yuri, 300);

			$resultado = $filtro->filtra($lances);
			$this->assertEquals(0, count($resultado));
		}

		public function testExcluirEntre3000E5000()
		{
			$yuri = new Usuario("Yuri");

			$filtro = new FiltroDeLances();

			$lances = [];
			$lances[] = new Lance($yuri, 4000);
			$lances[] = new Lance($yuri, 3500);

			$resultado = $filtro->filtra($lances);
			$this->assertEquals(0,count($resultado));
		}
	}
?>