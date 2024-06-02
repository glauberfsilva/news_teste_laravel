

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Notícias') }}
                </h2>
                <br />
                <div class="mb-4">
                    <input type="text" wire:model.debounce.500ms="searchTerm" placeholder="Buscar por título..."
                        class="w-full p-2 border rounded">
                </div>
                <br />
                @foreach ($news as $item)
                    <section class="text-gray-600 body-font">
                        <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
                            @if($item->image)
                                <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" alt="hero"
                                    src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">
                            @endif

                            <div class="text-center lg:w-2/3 w-full">
                                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">
                                    {{ $item->title }}
                                </h1>
                                <div> Criado em {{ $item->created_at->format('d/m/Y') }}</div><br />
                                <p class="mb-8 leading-relaxed">
                                    {{ $item->description }}
                                </p>
                            </div>
                        </div>
                    </section>
                    <hr />
                @endforeach

                <!-- Navegação de página -->
                <div class="mt-4 flex flex-col justify-end items-end">
                    {{ $news->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@livewireStyles
@livewireScripts