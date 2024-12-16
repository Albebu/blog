<?php

namespace models;

class Post {
    private $db;
    private $table_name = 'posts';

    public $id;
    public $title;
    public $body;
    public $created_at;
    public $modified_at;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create() {
        $query = "INSERT INTO $this->table_name (title, body) VALUES (:title, :body)";

        $stmt = $this->db->prepare($query);

        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->body = htmlspecialchars(strip_tags($this->body));

        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':body', $this->body);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function read() {
        $query = "SELECT id, title, body, created_at, modified_at FROM $this->table_name";

        $stmt = $this->db->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function delete() {
        $query = "DELETE FROM $this->table_name WHERE id = :id";

        $stmt = $this->db->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}