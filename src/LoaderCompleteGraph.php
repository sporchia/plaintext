<?php

class LoaderCompleteGraph extends Loader{
	
	private $numberOfVertices;
	
	public function __construct($n){
	    $this->numberOfVertices = $n;
	}
	
	public function getGraph(){
		$start = microtime(true);
		
		$graph = new Graph();
		$n = $this->numberOfVertices;
		
		$this->writeDebugMessage("start creating vertices\n");
		$graph->createVertices($n);
		
		$this->writeDebugMessage("start creating edges\n");

		for ($i = 0; $i < $n; ++$i){
		
			$vertex = $graph->getVertex($i);
		
			for ($j = $i + 1; $j < $n; ++$j){
				$vertex->createEdge( $graph->getVertex($j) );
			}
		}
		
		$end = microtime(true);
		$this->writeDebugMessage(($end - $start)." done ...\n");
		
		return $graph;
	}
	
	
	
}