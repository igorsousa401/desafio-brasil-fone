<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Empregados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('empregados.create') }}">
                        @csrf


                        <div>
                            <x-input-label for="name" :value="__('Nome')" />
                            <x-text-input id="nome" class="block mt-1 mb-4 w-full" type="text" name="name" :value="old('name')" required autofocus />

                            <x-input-label for="phone" :value="__('Telefone')" />
                            <x-text-input id="telefone" class="block mt-1 mb-4 w-full" type="text" name="phone" :value="old('phone')" required autofocus />

                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 mb-4 w-full" type="email" name="email" :value="old('email')" required autofocus />

                            <x-input-label for="adress" :value="__('Endereço')" />
                            <x-text-input id="endereco" class="block mt-1 mb-4 w-full" type="text" name="adress" :value="old('adress')" required autofocus />

                            <x-input-label for="salary" :value="__('Salário(R$)')" />
                            <x-text-input id="salario" class="block mt-1 mb-4 w-full" type="text" name="salary" :value="old('salary')" required autofocus />

                            <x-input-label for="office" :value="__('Cargo')" />
                            <x-text-input id="cargo" class="block mt-1 mb-4 w-full" type="text" name="office" :value="old('office')" required autofocus />


                            <x-input-label for="sector_id" :value="__('Setor')" />
                            <select id="sector_id" name="sector_id" class="bg-gray-50 border mt-1 mb-4 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option selected>Selecione um Setor</option>
                                @foreach($sectors as $sector)
                                    <option value="{{$sector->id}}">{{$sector->name}}</option>
                                @endforeach

                            </select>

                            @if(session()->has('error'))
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mt-3 rounded relative" role="alert">
                                    <strong class="font-bold">Erro</strong>
                                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                                    </span>
                                </div>
                            @endif
                            @if(session()->has('sucess'))
                                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 mt-3 shadow-md" role="alert">
                                    <div class="flex">
                                        <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                                        <div>
                                            <p class="font-bold">Sucesso</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ml-3">
                                {{ __('Registrar Setor') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="relative overflow-x-auto">
                <h2 class="font-semibold text-[3em] text-center pt-1 pb-2 text-gray-800 dark:text-gray-200 leading-tight mt-10">
                    Setores
                </h2>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nome do Funcionário
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Telefone
                        </th>
                        <th scope="col" class="px-6 py-3">
                            E-mail
                        </th><th scope="col" class="px-6 py-3">
                            Endereço
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Salário
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Cargo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Setor
                        </th>
                        <th scope="col" class="px-6 py-3">

                        </th>



                    </tr>
                    </thead>
                    <tbody>
                    @foreach($empregados as $empregado)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$empregado->name}}
                            </th>
                            <td class="px-6 py-4">
                                {{$empregado->phone}}
                            </td>
                            <td class="px-6 py-4">
                                {{$empregado->email}}
                            </td>
                            <td class="px-6 py-4">
                                {{$empregado->adress}}
                            </td>
                            <td class="px-6 py-4">
                                {{$empregado->salary}}
                            </td>
                            <td class="px-6 py-4">
                                {{$empregado->office}}
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $sector = \App\Models\Sector::find($empregado->sector_id)->first();
                                @endphp
                                {{$sector->name}}
                            </td>

                            <td class="px-6 py-4">
                                <form method="POST" action="{{route('setores.delete')}}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$empregado->id}}">
                                    <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>


</x-app-layout>
