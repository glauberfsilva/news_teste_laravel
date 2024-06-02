<div>
    <!-- Mensagens de Sucesso -->
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <!-- Formulário de Criação de Notícias -->
    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label for="title" class="block text-gray-700">Título:</label>
            <input type="text" id="title" wire:model="title" class="border rounded w-full p-2">
            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700">Descrição:</label>
            <textarea id="description" wire:model="description" class="border rounded w-full p-2"></textarea>
            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700">Imagem:</label>
            <input type="file" id="image" wire:model="image" class="border rounded w-full p-2">
            @error('image') <span class="text-red-500">{{ $message }}</span> @enderror

            <!-- Indicador de Carregamento -->
            <div wire:loading wire:target="image" class="text-gray-500">
                Carregando...
            </div>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Salvar
            </button>

            <!-- Indicador de Carregamento do Formulário -->
            <div wire:loading wire:target="save" class="text-gray-500 ml-4">
                Salvando...
            </div>
        </div>
    </form>
</div>

@livewireStyles
@livewireScripts
