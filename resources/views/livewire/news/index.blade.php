<div>
    <input type="text" wire:model="filter" placeholder="Filtrar por título" class="mb-4 p-2 border rounded  w-full">
    <br/><br/>
    @foreach ($news as $item)
        <div>
            <div class="flex w-full">
                <div class="w-1/5 mt-6">
                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">
                    @endif
                </div>
                <div class="w-4/5 flex flex-col justify-start items-start ml-1 p-4">
                    <div class="font-bold text-lg">{{ $item->title }}</div>
                    <div> Criado em {{ $item->created_at->format('d/m/Y') }}</div><br/>
                    <div>{{ $item->description }}</div>
                </div>
            </div>
            <div class="flex flex-row w-full justify-end items-end">
                <a href="{{ route('news.edit', $item->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-1">
                    Editar
                </a>
                <button wire:click="delete({{ $item->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-1">
                    Deletar
                </button>
            </div>
        </div>
        <br />
        <hr />
        <br />
    @endforeach

    <!-- Navegação de página -->
    <div class="mt-4">
        {{ $news->links() }}
    </div>
</div>

@livewireStyles
@livewireScripts
