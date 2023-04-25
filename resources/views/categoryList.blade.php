<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Categorias') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="col-8 m-auto">
                        <table class="table text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nome da Categoria</th>
                                <th scope="col">Data de Criação</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>

                        @foreach($categorys as $category)
                            <tbody>
                                <th scope="col">{{$category->id}}</th>
                                <th scope="col">{{$category->name}}</th>
                                <th scope="col">{{$category->created_at}}</th>
                                <th scope="col"></th>
                                <th scope="col">
                                    <a href="{{ url('category' , [ 'id' => $category->id ]) }}/edit">
                                        <button type="button" class="btn btn-primary">Atualizar dados</button>
                                    </a>
                                    <a href="{{ url('category' , [ 'id' => $category->id ]) }}/delete">
                                        <button type="button" class="btn btn-primary">Deletar dados</button>
                                    </a>
                                </th>
                            </tbody>
                        @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



