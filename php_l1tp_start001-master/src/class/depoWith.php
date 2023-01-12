<?php

class depoWith {
    private $db;

    function __construct($db) {
        $this->db = $db;
    }

    public function depo() {

        $user_id = $_SESSION["user_id"];
        
        $demande = $this->db->prepare("SELECT * FROM deposits WHERE id_users = $user_id");
        $demande->execute();
        $resultat = $demande->fetchAll();
        return $resultat;
    }

    public function with() {

        $user_id = $_SESSION["user_id"];

        $demande = $this->db->prepare("SELECT * FROM withdrawals WHERE id_users = $user_id");
        $demande->execute();
        $resultat = $demande->fetchAll();
        return $resultat;
    }

    public function tran() {

        $user_id = $_SESSION["user_id"];

        $demande = $this->db->prepare("SELECT * FROM transactions WHERE sender = $user_id OR receiver = $user_id");
        $demande->execute();
        $resultat = $demande->fetchAll();
        return $resultat;
    }

    
    public function balances() {

        $user_id = $_SESSION["user_id"];

        $demande = $this->db->prepare("SELECT balance FROM bankaccounts WHERE id_users = $user_id");
        $demande->execute();
        $resultat = $demande->fetch();
        return $resultat;
    }

}