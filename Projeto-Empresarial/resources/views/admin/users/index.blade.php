@extends('layouts.default')
@section('title', 'Usuarios')

@section('content')


<section class="section-container">

    @include('shared.search')

    <div class="flex items-center justify-between mt-12 mb-8">
        <h1 class="text-2xl font-medium title-font text-gray-900">
            Usuários
        </h1>
        <a href="{{ route('admin.users.create') }}" class="btn-primary">
            Adicionar
        </a>
    </div>

    <div class="w-full mx-auto overflow-auto">

        <table class="table-auto w-full text-left whitespace-no-wrap">
            <thead>
                <tr>
                    <th class="table-th">
                        #
                    </th>
                    <th class="table-th">
                        Avatar
                    </th>
                    <th class="table-th">
                        Nome
                    </th>
                    <th class="table-th">
                        Email
                    </th>
                    <th class="table-th">
                        CPF
                    </th>
                    <th class="table-th text-right">
                        Ações
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y">

                @foreach ($users as $user)
                <tr class="even:bg-gray-100 odd:bg-white">
                    <td class="px-4 py-3">{{ $user->id }}</td>
                    <td class="px-4 py-3">
                        <img alt="{{ $user->name }}" class="object-cover object-center w-12 h-12 rounded-full block"
                            src="{{ $user->avatar }}" style="width: 48px; min-width: 48px;" />
                    </td>
                    <td class="px-4 py-3">{{ $user->name }}</td>
                    <td class="px-4 py-3">{{ $user->email }}</td>
                    <td class="px-4 py-3">{{ $user->cpf }}</td>
                    <td class="px-4 py-3 text-sm text-right space-x-3 text-gray-900">
                        <a href="{{ route('admin.users.edit', $user->id) }}"
                            class="mt-3 text-indigo-500 inline-flex items-center">Editar</a>
                        <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="mt-3 text-indigo-500 inline-flex items-center">Deletar</button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <div class="py-12">
        {{ $users->links() }}
    </div>
</section>

@endsection
