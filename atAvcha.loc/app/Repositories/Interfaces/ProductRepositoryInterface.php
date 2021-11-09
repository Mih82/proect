<?php
namespace App\Repositories\Interfaces;


interface ProductRepositoryInterface
{
    public function all();

    public function findById($id);

    public function new();

    public function getProducts();
}

