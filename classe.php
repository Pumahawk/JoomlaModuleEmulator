
<?php
	class JURI
	{
		public function base()
		{
			return(dirname(JMEmulator::cutdir(__FILE__, 2))."/");
		}
	}
	class params
	{
		private $params;
		public function params($parametri)
		{
			$this -> params = $parametri;
		}
		public function get($par)
		{
			if(isset($this -> params[$par]))
				return $this -> params[$par];
			else
			{
				return false;
			}
		}
	}
	class JMemulator
	{
		
		private $module;
		private $params;
		public $errorlist;
		public $error;
		
		public function cutdir($dir, $n)
		{
			if(!isset($n))
				$n = 1;
			for($i = 0; $i < $n; $i++)
			{
				$dir = explode("/", $dir);
				unset($dir[1]);
				$dir = implode("/", $dir);
			}
			return $dir;
		}
		public function errore($er)
		{
			$this -> errorlist[] = $er;
			$this -> error = $er;
		}
		public function JMemulator($nome, $parametri)
		{
			if(!isset($nome, $parametri) or !is_array($parametri))
			{
				$this -> errore("Errore creazione oggetto");
			}
			$this -> module = $nome;
			$this -> params = $parametri;
		}
		public function stampa()
		{
			$params = new params($this -> params);
			define('_JEXEC', true);
			require(dirname(__FILE__)."/modules/".$this -> module."/".$this -> module.".php");
		}
	}
?>