<?php

namespace App\Http\Livewire\News;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\News;

class Edit extends Component
{
    use WithFileUploads;

    public $news;
    public $title;
    public $description;
    public $image;
    public $newImage;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'newImage' => 'nullable|image|max:1024', // Máx. 1MB para nova imagem
    ];

    public function mount($id)
    {
        $this->news = News::findOrFail($id);
        $this->title = $this->news->title;
        $this->description = $this->news->description;
        $this->image = $this->news->image;
    }

    public function save()
    {
        $this->validate();

        if ($this->newImage) {
            $imagePath = $this->newImage->store('images', 'public');
            $this->image = $imagePath;
        }

        $this->news->update([
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->image,
        ]);

        session()->flash('message', 'Notícia atualizada com sucesso.');

        return redirect()->to('/dashboard');
    }

    public function render()
    {
        return view('livewire.news.edit');
    }
}
