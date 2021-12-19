
{{-- definimos los estilos del boton edit del modulo edipost --}}

<div>
    <a class="btn-w btn-yellow btn-w:hover" wire:click="$set('open', true)">
        <i class="fas fa-edit"></i>
    </a>


    {{-- diseñamos y definimos la estructura del modal EditPost --}}




    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
         Editando el Post  : {{-- {{$post->title}} --}}
        </x-slot>
    
        <x-slot name="content">
          <div class="mb-4 mt-2">
            <x-jet-label value="Titulo del Post"/>
            <x-jet-input wire:model="post.title" type="text" class="w-full"/>
          </div>
    
          <div class="mb-4 mt-2">
            <x-jet-label value="Contenido del Post"/>
            <textarea wire:model="post.content" rows="6" class="form-control w-full"></textarea>
          </div>
    
          
        </x-slot>
    
        <x-slot name="footer">

            <x-jet-danger-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-danger-button>

             <x-jet-button wire:click="save" wire:loading.attr='disabled:opacity-25'>
                Actualizar
            </x-jet-button>
      
        </x-slot>
    
    </x-jet-dialog-modal>
    
    





</div>



