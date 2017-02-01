<?php 
	require '../Usuario.php';
	require '../Lance.php';
	require '../Leilao.php';
	class LeilaoTest extends PHPUnit_Framework_TestCase
	{
		
		public function testDeveProporUmLance()
		{
			$leilao = new Leilao('Macbook Caro');

			$this->assertEquals(0, count($leilao->getLances()));

			$yuri = new Usuario('Yuri');

			$leilao->propoe( new Lance($yuri,2000));

			$this->assertEquals(1, count($leilao->getLances()));
			$this->assertEquals(2000, $leilao->getLances()[0]->getValor());

		}
	}

?>