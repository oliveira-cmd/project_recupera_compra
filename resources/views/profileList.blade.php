<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Usuarios') }}
        </h2>
        </br>
        <a href="{{url('/profileRegister')}}">
            <h3>Cadastrar novos usuarios</h3>
        </a>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full text-left text-sm font-light">
                                    <thead class="border-b font-medium dark:border-neutral-500">
                                        <tr>
                                        <th scope="col" class="px-6 py-4">Id</th>
                                        <th scope="col" class="px-6 py-4">Nome</th>
                                        <th scope="col" class="px-6 py-4">Email</th>
                                        <th scope="col" class="px-6 py-4">Data de Criação</th>
                                        <th scope="col" class="px-6 py-4">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr class="border-b dark:border-neutral-500">
                                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{$user->id}}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{$user->name}}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{$user->email}}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{$user->created_at}}</td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    <a href="{{ url('profile' , [ 'id' => $user->id ]) }}/edit">
                                                        <button type="button" class="btn btn-primary">Atualizar dados</button>
                                                    </a>
                                                    |
                                                    <a href="{{ url('profile' , [ 'id' => $user->id ]) }}/delete">
                                                        <button type="button" class="btn btn-red">Deletar Usuario</button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <?= $users->links();?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



