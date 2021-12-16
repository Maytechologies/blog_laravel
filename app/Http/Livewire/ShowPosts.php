<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class ShowPosts extends Component
{

    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    /* resgistramos una propiedad que permita recibir propiedades y eventos de otro componente */

    protected $listeners =['reseteo' => 'render']; /* al recibir el veneto reseteo renderizame el componente */

   
    public function render()
    {
        $posts = Post::where('title', 'like', '%'. $this->search . '%')   /* EXTRAEMOS TODOS LOS REGISTRO QUE SE ENCUENTRAN EN LA TABLA POST */
                       ->orWhere('content', 'like', '%'. $this->search . '%')
                       ->orderBy($this->sort, $this->direction)
                       ->get(); /* QUE CUMPLAN CON LA CONDICION DE BUSQUEDA */

        return view('livewire.show-posts', compact('posts')); /* RENDERISAMOS EL CODIGO QUE SE EXPONE EN -> SHOW-POST.BLADE.PHP */
    }

    public function ordena($sort){
        
        if ($this->sort == $sort) {
            
            if ($this->direction == 'desc') {
                $this->direction = 'asc';

          } else {
              $this->direction = 'desc';
          }
          

        } else {
            $this->sort = $sort;
            $this->direction = 'desc';
        }
        
    }


}
