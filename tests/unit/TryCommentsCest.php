<?php

use App\Services\CommentService;

class TryCommentsCest
{
    private PDO $pdo;
    private CommentService $commentService;

    public function _before(UnitTester $I)
    {
        $this->pdo = new PDO("mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}", $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
        $this->commentService = new CommentService($this->pdo);

    }

    public function tryToAddComment(UnitTester $I)
    {
        $user_id = 3;
        $product_id = 2;
        $text = 'Лучший товар, что я только видел';
        $this->commentService->create($user_id, $product_id, $text);
        $I->seeInDatabase('comments', ['user_id' => $user_id, 'product_id' => $product_id, 'text' => $text]);
    }

    public function tryDeleteComment(UnitTester $I)
    {
        $id = 1;
        $this->commentService->delete($id);
        $I->dontSeeInDatabase('comments', ['id' => $id]);
    }
}
