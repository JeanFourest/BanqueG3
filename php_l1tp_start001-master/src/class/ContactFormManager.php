<?php

class ContactFormManager {
	private $db;

	function __construct($db) {
		$this->db = $db;
	}

	public function save_contact_form($fullname, $phone, $email, $message) {
		$stmh = $this->db->prepare('INSERT INTO contact_forms(fullname, phone, email, message) VALUES(:fullname, :phone, :email, :message)');
		$stmh->execute([
			'fullname' => $fullname,
			'phone' => $phone,
			'email' => $email,
			'message' => $message,
		]);
	}

	public function get_forms() {
		$stmh = $this->db->prepare("SELECT * FROM contact_forms");
		$stmh->execute();

		$forms = $stmh->fetchAll(PDO::FETCH_CLASS, 'ContactForm');
		return $forms;
	}
}
