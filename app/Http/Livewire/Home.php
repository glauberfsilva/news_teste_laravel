<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\News;

class Home extends Component
{
    use WithPagination;

    public $searchTerm;

    public function updatingSearchTerm()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = News::query();

        if ($this->searchTerm) {
            $query->where('title', 'like', '%' . $this->searchTerm . '%');
        }

        $query->orderBy('created_at', 'desc');

        $news = $query->paginate(6);

        return view('livewire.home', ['news' => $news]);
    }
}
