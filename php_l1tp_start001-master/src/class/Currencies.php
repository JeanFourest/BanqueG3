<?php

class Currencies{
    private $db;

    function __construct($db){
		$this->db = $db;
	}

    public function getPrice($nom){
        $demande_price = $this -> db -> query('SELECT price FROM currencies WHERE nom =' .(float)$nom);
        $reponse_price = $demande_price -> fetchAll(PDO::FETCH_COLUMN);
        return $reponse_price;
    }
}