<?php

namespace App\Controllers;

use App\Models\HeroRankModel;

class Home extends BaseController
{
    public function index()
    {
        $heroRanks = (new HeroRankModel())
            ->where('is_active', 1)
            ->orderBy('sort_order', 'ASC')
            ->findAll();

        return view('index', ['heroRanks' => $heroRanks]);
    }

    public function about()
    {
        return view('about');
    }
}