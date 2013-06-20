<?php

namespace Commando;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class TestCommande extends Command {
	protected $name = 'commando:config';
	protected $description = 'Configuration Commando';

	public function __construct()
	{
		parent::__construct();
	}
	public function fire()
	{
		$this->comment('=====================================');
		$file=__dir__.'/../../config/config.xml';
		$xml=simplexml_load_file($file);
		
		$url= $this->askBoucle('Logo link (http://....)','url');
		$xml->url=$url;
		
		foreach($xml->topics->topic as $topic){
			$ask='btn label for '.(String)$topic;
			$topic->attributes()->btn = $this->askBoucle($ask,'label');
		}
		
		$xml->asXML($file);
	}
	
	private function askBoucle($label,$error='nom invalide',$default=null)
	{
		$data='';
		do
		{
			// Ask the user to input value
			$data = trim($this->ask($label.' : ',$default));

			// Check if the value is valid.
			if ( strlen($data)<2 )
			{
				// Return an error message
				$this->error($error.' - merci de recommencer.');
			}
		}
		while( strlen($data)<2 );
		return $data;
	}	
}

