<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Usuarios') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                <form action="/listProfiles" method="GET" role="search"> 
                    {{ csrf_field() }}
                    <div class="search_user">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Procure um usuario por Nome ou email">
                    </div>
                </form>

                    <div class="col-8 m-auto">
                        <table class="table text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Data de Criação</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>

                        @foreach($users as $user)
                            <tbody>
                                <th scope="col">{{$user->id}}</th>
                                <th scope="col">{{$user->name}}</th>
                                <th scope="col">{{$user->email}}</th>
                                <th scope="col">{{$user->created_at}}</th>
                                <th scope="col"></th>
                                <th scope="col">
                                    <a href="{{ url('profile' , [ 'id' => $user->id ]) }}/edit">
                                        <button type="button" class="btn btn-primary">Atualizar dados</button>
                                    </a>
                                    <a href="{{ url('profile' , [ 'id' => $user->id ]) }}/delete">
                                        @include('profile.partials.delete-user-form')
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



