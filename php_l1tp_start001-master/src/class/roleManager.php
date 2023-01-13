<?php

class roleManager {
    private $db;

    function __construct($db) {
        $this->db = $db;
    }
  
    public function modifyRole() {
        $demande = $this->db->prepare("SELECT users.email, users.role, users.id FROM users");
        $demande->execute();
        $aff = $demande->fetchAll();
        return $aff;
    }

}