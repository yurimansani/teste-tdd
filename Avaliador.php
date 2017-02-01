<?php 
	class Avaliador
	{
		private $maiorDeTodos = -INF;
		private $menorDeTodos = INF;
		private $media = 0;
		private $maiores;

		public function avalia(Leilao $leilao)
		{
			$total = 0;
			foreach($leilao->getLances() as $lance)
			{
				$total += $lance->getValor();
				
				if($lance->getValor() > $this->maiorDeTodos)
				{
					$this->maiorDeTodos = $lance->getValor();
				}
				if($lance->getValor() < $this->menorDeTodos)
				{
					$this->menorDeTodos = $lance->getValor();
				}
			}
			if ($total == 0 || count($leilao->getLances()) == 0) 
			{
				$this->media = 0;
			}
			else
			{
				$this->media = $total / count($leilao->getLances());
			}
			
			$this->pegaOsMaioresNo($leilao);
		}

		public function pegaOsMaioresNo(Leilao $leilao)
		{
			$lances = $leilao->getLances();
			usort($lances,function ($a,$b) 
			{
				if($a->getValor() == $b->getValor()) return 0;
				return ($a->getValor() < $b->getValor()) ? 1 : -1;
			});

			$this->maiores = array_slice($lances, 0,3);
		}

		public function getTresMaiores()
		{
			return $this->maiores;
		}

		public function getMaiorLance()
		{
			return $this->maiorDeTodos;
		}

		public function getMenorLance()
		{
			return $this->menorDeTodos;
		}

		public function getMedia()
		{
			return $this->media;
		}
	}
?>