@extends('layouts.default')
@section('title', 'Admin Usuarios')

@section('content')

@if (session()->has('create'))
@include('shared.notifications.success', ['message' => session('create')])
@endif

@if (session()->has('edit'))
@include('shared.notifications.info', ['message' => session('edit')])
@endif

@if (session()->has('destroy'))
@include('shared.notifications.error', ['message' => session('destroy')])
@endif

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
                    <th class="table-th text-center">
                        Ações
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y">

                @foreach ($users as $user)
                <tr class="table-tr">
                    <td class="px-4 py-3">{{ $user->id }}</td>
                    <td class="px-4 py-3">
                        <img alt="{{ $user->name }}" class="avatar w-12 h-12" src="{{ $user->avatar }}"
                            style="width: 48px; min-width: 48px;" />
                    </td>
                    <td class="px-4 py-3">{{ $user->name }}</td>
                    <td class="px-4 py-3">{{ $user->email }}</td>
                    <td class="px-4 py-3">{{ $user->cpf }}</td>

                    <td class="px-4 py-3 text-sm text-center">

                        <div class="inline-flex gap-2 items-center justify-center">

                            <a href="{{ route('admin.users.edit', $user->id) }}" title="Editar usuáario {{ $user->id }}"
                                class="text-indigo-600 hover:text-indigo-500">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                    </path>
                                    <path fill-rule="evenodd"
                                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>

                            <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}"
                                class="flex items-center">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Deletar usuáario {{ $user->id }}"
                                    class="text-indigo-600 hover:text-indigo-500 inline-flex items-center">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>

                                </button>
                            </form>
                        </div>
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
