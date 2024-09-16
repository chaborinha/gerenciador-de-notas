<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    <div class="container mx-auto px-4 py-6">
        <!-- Botão Adicionar Nova Nota -->
        <div class="flex justify-center mb-6">
            <a href="{{ route('nota.create') }}">
                <button type="button" class="bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-green-600 transition duration-300">
                    Adicionar Nova Nota
                </button>
            </a>
        </div>

        <!-- Tabela -->
        <div class="overflow-x-auto">
            <div class="flex justify-center">
                <table class="min-w-full max-w-4xl divide-y divide-gray-200 bg-white shadow-md rounded-lg">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Título</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Conteúdo</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($notas as $note)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $note->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $note->titulo }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $note->conteudo }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('nota.edit', $note->id) }}" class="text-yellow-600 hover:text-yellow-800 ml-3">Editar</a>
                                    <form action="{{ route('nota.destroy', $note->id) }}" method="POST" class="inline ml-3">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Você tem certeza que deseja excluir esta nota?')">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @if($notas->isEmpty())
            <p class="mt-6 text-gray-500 text-center">Você não tem notas.</p>
        @endif
    </div>
</x-app-layout>
