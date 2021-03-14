<?php

namespace App\models;

use App\Services\WishListService;

class WishList
{
    public WishListService $wishListService;

    public function __construct()
    {
        $this->wishListService = new WishListService(WishListService::connect());
    }

    public function getWishById(int $id)
    {
        return $this->wishListService->getById($id);
    }

    public function countForUser(int $user_id)
    {
        return count($this->wishListService->getByUserId($user_id));
    }

    public function getWishForUser(int $user_id)
    {
        return $this->wishListService->getAllWishForUser($user_id);
    }

    public function createWish(int $user_id, int $product_id)
    {
        return $this->wishListService->create($user_id, $product_id);
    }

    public function updateWish(int $id, int $user_id, int $product_id)
    {
        return $this->wishListService->update($id, $user_id, $product_id);
    }

    public function deleteWish(int $id)
    {
        return $this->wishListService->delete($id);
    }

}