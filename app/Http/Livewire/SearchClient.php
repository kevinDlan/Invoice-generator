<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;

class SearchClient extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $query;
    public $perPage = 10;
    public function render()
    {
        return view(
            'livewire.search-client',
            ["clients" => Client::where('first_name','LIKE','%'.$this->query.'%')
                       ->orderBy('created_at', 'desc')
                       ->paginate($this->perPage)
            ]);
    }


    public function updatingQuery()
    {
        $this->resetPage();
    }
}
