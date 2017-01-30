<?php 
	class Avaliador
	{
		private $maiorValor = -INF;
		private $menorValor = INF;
		
		public function avalia(Leilao $leilao)
		{
			foreach ($leilao->getLances() as $lance ) {
				if ($lance->getValor() > $this->maiorValor) 
				{
					$this->maiorValor = $lance->getValor();
				}
				if ($lance->getValor() < $this->menorValor) 
				{
					$this->menorValor = $lance->getValor();
				}
				
			}
		}
		
		public function avaliaMedia(Leilao $leilao)
		{
			$qtdLances = count($leilao->getLances());
			
			$valorTotal = 0;
			
			foreach ($leilao->getLances() as $lance ) 
			{
				$valorTotal = $valorTotal + $lance->getValor();
			}

			$valorMedio = $valorTotal / $qtdLances;
			return $valorMedio;
		}



		public function getMaiorLance()
		{
			return $this->maiorValor;
		}

		public function getMenorLance()
		{
			return $this->menorValor;
		}
	}

?>