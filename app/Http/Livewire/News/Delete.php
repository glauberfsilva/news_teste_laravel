<?php

namespace App\Http\Livewire\News;

use Livewire\Component;
use App\Models\News;

class Delete extends Component
{
    public $newsId;

    public function mount($news)
    {
        $this->newsId = $news;
    }

    public function delete()
    {
        $news = News::findOrFail($this->newsId);
        $news->delete();

        session()->flash('message', 'Notícia deletada com sucesso.');

        return redirect()->route('news.index');
    }

    public function render()
    {
        return ''; // No need to render a specific view for delete
    }
}
