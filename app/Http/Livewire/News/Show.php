<?php

namespace App\Http\Livewire\News;

use Livewire\Component;
use App\Models\News;

class Show extends Component
{
    public $news;

    public function mount($id)
    {
        $this->news = News::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.news.show');
    }
}
