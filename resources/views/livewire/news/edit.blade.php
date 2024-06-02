<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-6">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Editar Notícia') }}
                </h2>
                <br />
                @if (session()->has('message'))
                    <div class="bg-green-500 text-white p-2 rounded mb-4">
                        {{ session('message') }}
                    </div>
                @endif
                <form wire:submit.prevent="save">
                    <div>
                        <label>Título:</label><br />
                        <input type="text" wire:model="title" class="w-full border rounded w-full p-2">
                        @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <br />
                    <div>
                        <label>Descrição:</label><br />
                        <textarea wire:model="description" class="w-full border rounded w-full p-2"></textarea>
                        @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <br />
                    <div>
                        <label>Imagem Atual:</label><br />
                        @if ($image)
                            <img src="{{ asset('storage/' . $image) }}" alt="{{ $title }}" width="200">
                        @endif
                    </div>
                    <br />
                    <div class="mb-4">
                        <label>Nova Imagem:</label><br />
                        <input type="file" wire:model="newImage">
                        @error('newImage') <span class="text-red-500">{{ $message }}</span> @enderror

                        <div wire:loading wire:target="newImage" class="text-gray-500">
                            Carregando...
                        </div>
                    </div>
                    <br />
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Salvar</button>
                    <div wire:loading wire:target="save" class="text-gray-500 ml-4">
                        Salvando...
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@livewireStyles
@livewireScripts
