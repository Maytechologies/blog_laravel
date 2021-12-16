<div>
    {{-- aqui codificamos todo el codigo que se exponga en la vista al usuario final, NOTA: el codigo a exponer siempre debe estar 
  entre las dos etiquetas DIV.. --}}

    <x-table>

        <div class="px-6 py-4 flex items">
            {{-- <input type="text" wire:model="search"> --}}

            <x-jet-input type="text" wire:model="search" placeholder="Busqueda" class="flex-1 mr-2 text-gray-800" />

            @livewire('create-post') 

        </div>

        @if ($posts->count()) {{-- Condicional = muestra la tabla con resultado si existe el registro solicitado --}}


            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">

                    {{-- Cabeceras titulos de columnas --}}

                    <tr>
                        <th scope="col"
                            class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider"
                            wire:click="ordena('id')">
                            ID <i class="fas fa-sort font-medium text-gray-400 py-2"></i>
                        </th>

                        <th scope="col"
                            class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider"
                            wire:click="ordena('title')">
                            Titulo <i class="fas fa-sort font-medium text-gray-400 py-3"></i>
                        </th>

                        <th scope="col"
                            class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider"
                            wire:click="ordena('content')">
                            Contenido <i class="fas fa-sort font-medium text-gray-400"></i>
                        </th>

                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                            Funciones
                        </th>


                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">



                    @foreach ($posts as $post)



                        <tr> {{-- inicio de fila --}}


                            {{-- informacion de la DB en la table --}}



                            <td class="px-6 py-4 ">
                                <div class="text-sm text-gray-400">{{ $post->id }} </div>

                            </td>


                            <td class="px-6 py-4 ">
                                <div class="text-sm text-gray-400">{{ $post->title }} </div>
                            </td>


                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-400">{{ $post->content }} </div>
                            </td>


                            <td class="px-6 py-4">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                        </tr>

                    @endforeach

                       
                    <!-- More people... -->
                </tbody>
            </table>


        @else {{-- De no existir coincidencias con algun registro muestra el siguiente mensaje --}}

            <div class="px-6 py-4 text-red-500">
                <p>No Existe Ningún Registro Solicitado..!</p>
            </div>

        @endif

    </x-table>


</div>
