<div>
    
       <div class="mx-4">
            <x-jet-button wire:click="$set('open', true)"  class="btn-green">
        
            
                Nuevo Post   {{-- agregamos componente de jetstring boton --}}
            
        
        </x-jet-button>
       </div>
    

   


                          {{-- Agregamos la sesiones de nuestro modal aplicando Slot --}}
   <x-jet-dialog-modal wire:model="open">

    <x-slot name="title">
        
            Crear Nuevo Post
        
    </x-slot>


    <x-slot name="content">

        <div class="mb-4 py-2 px-2">
            @if ($image)

            <img src="{{$image -> temporaryUrl()}}">
                
            @endif 
        </div>


        <div class="mb-4">
            <x-jet-label value="Titulo de Post"/>
            <x-jet-input type=text class="w-full" placeholder="Titulo del post" wire:model.defer='title'/>
            <x-jet-input-error for="title"/>
          
        </div>

        <div class="mb-4">
            <x-jet-label value="Contenido del Post"/>
            <textarea class="form-control w-full" rows="10" placeholder="Descripcion detallada del post" wire:model.defer='content'>  
            </textarea>
            <x-jet-input-error for="content"/>
            
        </div>

        <div>
            <input type="file" wire:model="image" id="{{$identificador}}">
            <x-jet-input-error for="image"/>
        </div>


    </x-slot>


        <x-slot name="footer">

            <x-jet-danger-button class="mx-4" wire:click="$set('open', false)"> {{-- aplicamos un evencto click, cambiar el valor de la propiedad open --}}
                Cerrar
            </x-jet-danger-button>


            <x-jet-secondary-button wire:click='save'> {{-- aplicamos evento save, que vincularemos en el controlador CreatePOst --}}
                Registrar
            </x-jet-secondary-button>
            
        </x-slot>
        


   </x-jet-dialog-modal>

</div>
