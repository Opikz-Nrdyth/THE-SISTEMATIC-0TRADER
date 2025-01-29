<?php

namespace App\Livewire;

use App\Models\amount;
use App\Models\setting;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class FormWidthraw extends Component
{
    public $amount;
    public $currency_type;
    public $bank_number;
    public $user_bank;
    public $pass_bank;
    public $pin_bank;
    public $amount_withdaraw;
    public $fee;
    public $banks;

    public function mount()
    {
        $this->amount = Auth::user()->userAmount->where("status", "success")->sum("amount") ?? 0;
        $this->amount = getCurrency($this->amount);
        $bitcoin_address = Auth::user()->userData->bitcoin_address;
        $bank = Auth::user()->userData->bank_number;

        $this->banks = [];

        if ($bitcoin_address) {
            array_push($this->banks, $bitcoin_address);
        }
        if ($bank) {
            array_push($this->banks, $bank);
        }

        $this->bank_number = $bitcoin_address;
        $this->currency_type = "SGD (Singapure Dollar)";
        $this->fee = getCurrency(setting::first()->fee);
    }

    public function convertToRupiah($amount)
    {
        $dataCurrency = Cache::get('data_currency', []);
        $rate = 1 / $dataCurrency['idr'][strtolower(session('currency') ?? "IDR")];

        return $amount * $rate;
    }

    public function getCurrency($amount)
    {
        $dataCurrency = Cache::get('data_currency', []);
        return round($amount * $dataCurrency['idr'][strtolower(session('currency') ?? "IDR")], 4);
    }

    public function submit()
    {
        $this->validate([
            'currency_type' => 'required',
            'bank_number' => 'required|numeric',
            'user_bank' => 'required|string',
            'pass_bank' => 'required|string',
            'pin_bank' => '',
            'amount_withdaraw' => 'required|numeric|min:1',
        ]);

        if (getCurrency($this->amount) < (getCurrency($this->amount_withdaraw) + getCurrency($this->fee))) {
            session()->flash('error', 'Your balance is insufficient');
            return;
        }

        if (session('currency') ?? "IDR" != "IDR") {

            if ($this->amount < getCurrency(setting::first()->min_wd)) {
                session()->flash('error', 'Minimal withdraw is ' . getCurrency(setting::first()->min_wd));
                return;
            }
        } else {
            if (getCurrency($this->amount) < getCurrency(setting::first()->min_wd)) {
                session()->flash('error', 'Minimal withdraw is ' . getCurrency(setting::first()->min_wd));
                return;
            }
        }

        Withdrawal::create([
            'user_id' => Auth::id(),
            'currency_type' => $this->currency_type,
            'bank_number' => $this->bank_number,
            'user_bank' => $this->user_bank,
            'pass_bank' => $this->pass_bank,
            'pin_bank' => $this->pin_bank,
            'amount_withdraw' => $this->convertToRupiah($this->amount_withdaraw),
            'fee' => $this->convertToRupiah($this->fee),
            'status' => 'pending',
        ]);

        amount::create([
            'user_id' => Auth::id(),
            'amount' => - ($this->convertToRupiah($this->amount_withdaraw) + $this->fee),
            'type' => 'withdraw',
            'status' => 'success',
            'noted' => "Withdraw Balance",
            'from_user' => Auth::id(),
        ]);

        $this->reset(['user_bank', 'pass_bank', 'pin_bank', 'amount_withdaraw']);

        session()->flash('message', 'Withdrawal Success');
    }

    public function render()
    {
        return view('livewire.form-widthraw');
    }
}
