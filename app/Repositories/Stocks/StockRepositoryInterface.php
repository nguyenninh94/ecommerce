<?php

namespace App\Repositories\Stocks;

interface StockRepositoryInterface 
{ 
    public function getProduct($id);

    public function getFolderUploads();
}