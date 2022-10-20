<?php

namespace App\Http\Livewire;

use App\Models\Projet;
use Livewire\Component;

class ProjectList extends Component
{
    public $query;
    public $perPage = 10;

    public function render()
    {
        return view(
            'livewire.project-list',
            ["projets" => Projet::where('title','LIKE','%'.$this->query.'%')
                       ->orderBy('created_at', 'desc')
                       ->paginate($this->perPage)
                    ]);
    }
}
