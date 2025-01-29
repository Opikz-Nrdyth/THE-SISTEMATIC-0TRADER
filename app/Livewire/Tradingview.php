<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Tradingview extends Component
{
    public $symbol = 'TRADE';
    public $leverage = 400;
    public $timeframe = '30';
    public $currentPrice = 0;

    public function buy() {}

    public function sell() {}

    public function mount()
    {

        $dataCurrency = Cache::get('data_currency', []);
        $this->currentPrice = Auth::user()->userAmount->where('status', 'success')->sum('amount');
        $this->currentPrice = round($this->currentPrice * $dataCurrency['idr'][strtolower(session('currency') ?? "IDR")], 4);
    }


    public function render()
    {
        return view('livewire.tradingview');
    }
}
