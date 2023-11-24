<?php

namespace App\Livewire;

use App\Models\PaymentMethod;
use Livewire\Component;

class Wallet extends Component
{
    public $wallets;
    public $selectedWallet;

    public function mount()
    {
        $this->wallets = PaymentMethod::all();
    }
    public function render()
    {
        return view('livewire.wallet');
    }
    public function close()
    {
        $this->reset();
    }
}
