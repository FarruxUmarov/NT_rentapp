<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Branch;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function home(): View|Factory|Application
    {
        $branches = Branch::all();
        $ads      = Ad::all();
        return view('home', ['branches' => $branches, 'ads' => $ads]);
    }

    public function branches(): View|Factory|Application
    {
        $branches = Branch::all();
        return view('branches', ['branches' => $branches]);
    }
}
