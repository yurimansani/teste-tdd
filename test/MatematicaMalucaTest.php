<?php 
	require '../MatematicaMaluca.php';
	
	class MatematicaMalucaTest extends PHPUnit_Framework_TestCase
	{
		public function testNumeroMaiorQueTrinta() 
		{
			$resultadoEsperado = 160;
			$conta = new  MatematicaMaluca();
			$resultadoCalculado = $conta->contaMaluca(40);
			$this->assertEquals($resultadoEsperado, $resultadoCalculado);
		}
		
		public function testNumeroMaiorQueDez() 
		{
			$resultadoEsperado = 60;
			$conta = new  MatematicaMaluca();
			$resultadoCalculado = $conta->contaMaluca(20);
			$this->assertEquals($resultadoEsperado, $resultadoCalculado);
		}

		public function testNumeroMenorQueDez() 
		{
			$resultadoEsperado = 14;
			$conta = new  MatematicaMaluca();
			$resultadoCalculado = $conta->contaMaluca(7);
			$this->assertEquals($resultadoEsperado, $resultadoCalculado);
		}
	}

?>