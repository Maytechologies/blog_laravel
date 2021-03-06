<div>
    {{-- aqui codificamos todo el codigo que se exponga en la vista al usuario final, NOTA: el codigo a exponer siempre debe estar 
  entre las dos etiquetas DIV.. --}}

    <x-table>

        <div class="px-6 py-4 flex items-center">
            
             <div class="flex px-6 py-4 items-center"> {{-- insertamos el select y sus opciones numero de posts --}}
                 <span class="px-2">Mostrar </span>
                 <select wire:model="cantidad" class="form-control">
                     <option value="5">05</option>
                     <option value="10">10</option>
                     <option value="20">20</option>
                     <option value="50">50</option>
                 </select>
                 <span class="px-2"> Post</span>
             </div>



            <x-jet-input class="flex-1 mx-2 text-gray-800"  placeholder="Busqueda" type="text" wire:model="search"  />

            
                @livewire('create-post') 
            

        </div>

        @if ($posts->count()) {{-- Condicional = muestra la tabla con resultado si existe el registro solicitado --}}


            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">

                    {{-- Cabeceras titulos de columnas --}}

                    <tr>
                        <th scope="col"
                            class=" cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider"
                            wire:click="ordena('id')">
                            ID <i class="fas fa-sort font-medium text-gray-400 py-2"></i>
                        </th>

                        <th scope="col"
                            class="px-2 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                            Imagen 
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



                            <td class="px-6 py-4 font-bold">
                                <div class="text-sm text-gray-400">{{ $post->id }} </div>

                            </td>

                            <td class="px-6 py-4 font-bold">
                                <div class="text-sm text-gray-400  w-10 h-10">
                                    <img class="rounded-full" src="{{Storage::url($post->image)}}"> </div>

                            </td>


                            <td class="px-6 py-4 font-bold">
                                <div class="text-sm text-gray-400">{{ $post->title }} </div>
                            </td>


                            <td class="px-6 py-4 font-bold">
                                <div class="text-sm text-gray-400">{{ $post->content }} </div>
                            </td>


                            <td class="px-6 py-4 font-bold">
                               @livewire('edit-post', ['post' => $post], key($post->id))
                            </td>
                        </tr>

                    @endforeach

                       
                    <!-- More people... -->
                </tbody>
            </table>


        @else {{-- De no existir coincidencias con algun registro muestra el siguiente mensaje --}}

            <div class="px-6 py-4 text-red-500">
                <p>No Existe Ning??n Registro Solicitado..!</p>
            </div>

        @endif

        {{-- aplicamos la paginaci??n de nuestros post --}}

        @if ($posts->hasPages()) {{-- si la busqueda requiere de mas de 1 pagina muestra el paginador --}}

        <div class="px-6 py-3">
            {{$posts->links()}}
        </div>
            
        @endif


    </x-table>


</div>
