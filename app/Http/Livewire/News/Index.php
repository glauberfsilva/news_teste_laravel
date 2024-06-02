<?php

namespace App\Http\Livewire\News;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\News;

class Index extends Component
{
    use WithPagination; 

    public $filter = ''; // Propriedade para armazenar o filtro


    public function updatingFilter()
    {
        $this->resetPage();
    }

    public function delete($newsId)
    {
        $news = News::findOrFail($newsId);
        $news->delete();

        session()->flash('message', 'Notícia deletada com sucesso.');
    }

    public function render()
    {
        $news = News::where('title', 'like', '%' . $this->filter . '%')
                    ->orderBy('created_at', 'desc') // Ordenar em ordem decrescente da data de criação
                    ->paginate(6);

        return view('livewire.news.index', ['news' => $news]);
    }
}
