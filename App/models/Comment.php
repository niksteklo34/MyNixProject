<?php


namespace App\models;


use App\Services\CommentService;

class Comment
{
    private CommentService $commentService;

    public function __construct()
    {
        $this->commentService = new  CommentService(CommentService::connect());
    }

    public function getAllComments()
    {
        return $this->commentService->getAll();
    }

    public function getCommentById(int $id)
    {
        return $this->commentService->getById($id);
    }

    public function getAllCommentsForProduct($product_id) {
        return $this->commentService->getAllCommentsForProduct($product_id);
    }

    public function getAllCommentsByUser($user_id) {
        return $this->commentService->getAllCommentsByUser($user_id);
    }

    public function createComment(int $user_id, int $product_id, string $comment) : bool
    {
        return $this->commentService->create($user_id, $product_id, $comment);
    }

    public function updateComment(int $id, int $user_id, int $product_id, string $comment) :bool
    {
        return $this->commentService->update($id, $user_id, $product_id, $comment);
    }

    public function deleteComment(int $id) : bool
    {
        return $this->commentService->delete($id);
    }

}