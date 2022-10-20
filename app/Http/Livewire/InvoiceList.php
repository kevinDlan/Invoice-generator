<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use Livewire\Component;
use Livewire\WithPagination;

class InvoiceList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    

    public $query;
    public $perPage = 10;
    public function render()
    {
        return view('livewire.invoice-list',["invoices" => Invoice::where("invoice_no","LIKE",'%'. $this->query.'%')->orderBy('created_at', 'desc')->paginate($this->perPage)]);
    }


    public function updatingQuery()
    {
        $this->resetPage();
    }
}
