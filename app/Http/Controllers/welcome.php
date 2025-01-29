<?php

namespace App\Http\Controllers;

use App\Models\news;
use App\Models\notification;
use App\Models\User;
use App\Models\userData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class welcome extends Controller
{
    public function Welcome()
    {
        // $members = Auth::user() ? userData::where("referals", Auth::user()->userData->username ?? "-")->count() :  0;
        $members = Auth::user() ? Auth::user()->userData->members :  0;
        $bonus = Auth::user() ? Auth::user()->userAmount->where('status', 'success')->where('type', 'bonus')->sum('amount') : 0;
        $profits = Auth::user() ? Auth::user()->userAmount->where('status', 'success')->where('type', 'profits')->sum('amount') : 0;
        $wallet = Auth::user() ? Auth::user()->userAmount->where('status', 'success')->sum('amount') : 0;

        $dataCurrency = Cache::get('data_currency', []);

        if ($dataCurrency) {
            $currencyType = Auth::user()->userData->type_currency ? Auth::user()->userData->type_currency : "IDR";
            $bonus = round($bonus * $dataCurrency['idr'][strtolower($currencyType)], 4) ?? $bonus;
            $profits = round($profits * $dataCurrency['idr'][strtolower($currencyType)], 4) ?? $profits;
            $wallet = round($wallet * $dataCurrency['idr'][strtolower($currencyType)], 4) ?? $wallet;
        }

        $news = news::where('status', 'publish')->get();
        $notification = Notification::where(function ($query) {
            $query->where('user_id', Auth::id())
                ->orWhere('user_id', 'All');
        })
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('welcome', [
            'route' => ['profile'],
            'title' => 'Dashboard',
            'members' => $members,
            'bonus' => $bonus,
            'profits' => $profits,
            'wallet' => $wallet,
            'news' => $news,
            'notification' => $notification,
        ]);
    }
}
