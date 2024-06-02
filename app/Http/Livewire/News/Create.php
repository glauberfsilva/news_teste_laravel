<?php

namespace App\Http\Livewire\News;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\News;

class Create extends Component
{
    use WithFileUploads;
    public $title;
    public $description;
    public $image;

    public function save()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|max:1024', // Máx. 1MB
        ]);

        $imagePath = $this->image->store('images', 'public');


        News::create([
            'title' => $this->title,
            'description' => $this->description,
            'image' => $imagePath,
            'user_id' => auth()->id(),
        ]);

        session()->flash('message', 'Notícia criada com sucesso!');
        
        $this->reset();

    }

    public function render()
    {
        return view('livewire.news.create');
    }
}
