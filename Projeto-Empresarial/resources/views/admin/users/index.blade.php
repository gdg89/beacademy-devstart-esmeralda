@extends('layouts.default')
@section('title', 'Usuarios')

@section('content')


<section class="text-gray-600 py-16">

    <div class="container px-5 pt-8 pb-24 mx-auto w-full">


        <div class="w-full mx-auto overflow-auto">
            <div class="flex items-center justify-between mb-2">
                <h1 class="text-2xl font-medium title-font mb-2 text-gray-900">
                    Usuarios
                </h1>
                <a href="{{ route('admin.users.create') }}" class="flex ml-auto text-white bg-indigo-500 border-0 py-1.5 px-3 text-sm focus:outline-none
                hover:bg-indigo-600 rounded">
                    Adicionar
                </a>
            </div>
            <table class="table-auto w-full text-left whitespace-no-wrap">
                <thead>
                    <tr>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                            #
                        </th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                            Nome
                        </th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                            Email
                        </th>

                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                           Phone
                        </th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                            Address
                        </th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                            Birthday
                        </th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                            CPF
                        </th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                            Password
                        </th>
                        <th
                            class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 text-right">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y">

                    @foreach ($users as $user)
                    <tr class="even:bg-gray-100 odd:bg-white">
                        <td class="px-4 py-3">{{ $user->id }}</td>
                        <td class="px-4 py-3">{{ $user->name }}</td>
                        <td class="px-4 py-3">{{ $user->email }}</td>
                        <td class="px-4 py-3">{{ $user->phone }}</td>
                        <td class="px-4 py-3">{{ $user->address }}</td>
                        <td class="px-4 py-3">{{ $user->birthday }}</td>
                        <td class="px-4 py-3">{{ $user->cpf }}</td>
                        <td class="px-4 py-3">{{ $user->password }}</td>
                        <td class="px-4 py-3 text-sm text-right space-x-3 text-gray-900">
                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                class="mt-3 text-indigo-500 inline-flex items-center">Editar</a>
                            <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="mt-3 text-indigo-500 inline-flex items-center">Deletar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection