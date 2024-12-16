<?php

namespace controllers;

use models\Post;

class PostController {
    private $postModel;

    public function __construct(Post $post) {
        $this->postModel = $post;
    }

    public function handlePostCreation($title, $body) {
        $this->postModel->title = $title;
        $this->postModel->body = $body;

        if($this->postModel->create()) {
            echo "Post creado exitosamente";
        } else {
            echo "Error al crear el post";
        }
    }

    public function handleRead() {
        $stmt = $this->postModel->read();

        if($stmt->rowCount() > 0) {
            $posts_arr = array();

            while($row = $stmt->fetch()) {
                $post_item = array(
                    'id' => $row['id'],
                    'title' => $row['title'],
                    'body' => $row['body'],
                    'created_at' => $row['created_at'],
                    'modified_at' => $row['modified_at']
                );

                array_push($posts_arr, $post_item);
            }

            echo json_encode($posts_arr);
        } else {
            echo "No se encontraron posts";
        }
    }

    public function handlePostDelete($id) {
        $this->postModel->id = $id;

        if($this->postModel->delete()) {
            echo "Post eliminado exitosamente";
        } else {
            echo "Error al eliminar el post";
        }
    } 
}