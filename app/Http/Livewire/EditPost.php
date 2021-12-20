<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;


class EditPost extends Component
{

    use WithFileUploads;


    public $open = false;

    public $post, $image, $identificador; /* declaramos las nuevas propiedades propiedad */

    
    public function mount(Post $post){ /* le pasamos los datos del metodo post a la propiedad pos */
        $this->post = $post;
    }
   
    protected $rules = [
        'post.title' => 'required',
        'post.content' => 'required',
    ];

    public function save(){


      $this->validate();

      if ($this->image) {

        Storage::delete([$this->post->image]); /* Si el post cuenta con una imagen ELIMINARLA */
 

        $this->post->image = $this->image->store('post'); /* asignar la nueva imagen que se envia al post */
          
      }


        $this->post->save();
        
        $this->reset('open', 'image');

        $this ->identificador =rand();

        /* $this->emitTo('show-posts', 'render'); */

        $this->emit('reseteo');

        $this->emit('alert_up');

    }

    public function render()
    {
        return view('livewire.edit-post');
    }
}
