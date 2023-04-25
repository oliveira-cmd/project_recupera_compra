
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
                    <form method="post" action="{{ url('/editCategory') }}" class="mt-6 space-y-6">
                        <div class="categoryName">
                        @if (!empty($category->name))
                            <input type="text" name="categoryName" id="categoryName" value="Produtos">
                        @else
                            <input type="text" name="categoryName" id="categoryName" value="">
                        @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>