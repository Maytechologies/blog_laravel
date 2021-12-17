<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class EditPost extends Component
{
    public $post; /* declaramos una nueva propiedad */

    public function mount(Post $post){ /* le pasamos los datos del metodo post a la propiedad pos */
        $this->post = $post;
    }
   

    public function render()
    {
        return view('livewire.edit-post');
    }
}
