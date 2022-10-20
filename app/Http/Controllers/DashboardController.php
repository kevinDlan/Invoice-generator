<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Comment;
use App\Models\Invoice;
use App\Models\Projet;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $client = Client::count();
        $invoice = Invoice::count();
        $comment = Comment::count();
        $project = Projet::count();
        $recentComment = Comment::orderBy("created_at","desc")->take(3)->get();

        return view("features.dashboard.index",
            [
                "client"=>$client,
                "invoice" => $invoice,
                "comment" => $comment,
                "project" => $project,
                "recentComment" => $recentComment,
            ]);
    }
}
