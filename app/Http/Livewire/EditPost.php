<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class EditPost extends Component
{
    public $open = false;

    public $post; /* declaramos una nueva propiedad */

    
    public function mount(Post $post){ /* le pasamos los datos del metodo post a la propiedad pos */
        $this->post = $post;
    }
   
    protected $rules = [
        'post.title' => 'required',
        'post.content' => 'required',
    ];

    public function save(){

        $this->validate();

        $this->post->save();
        
        $this->reset();

        /* $this->emitTo('show-posts', 'render'); */

        $this->emit('reseteo');

        $this->emit('alert', 'Actualización Efectuada con Exito..');

    }

    public function render()
    {
        return view('livewire.edit-post');
    }
}
