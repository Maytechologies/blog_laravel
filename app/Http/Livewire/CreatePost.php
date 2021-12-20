<?php

namespace App\Http\Livewire;


use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePost extends Component


{
    use WithFileUploads;  /* indicamos la ulizacion del componente para gestionar archivos */

    public $open = false;  /*  Propiedad vinculada con la accion click of wie create pos */

    public $title, $content, $image, $identificador; /* creamos estas dos propiedade para interactuar con los campos de la DB */

    public function mont(){
        $this->identificador = rand();
    }

    protected $rules = [
      'title'=> 'required',
      'content' => 'required',
      'image' => 'required|image|min:100'
    ];


    public function save(){
       
        $this->validate();

        $image = $this ->image->store('posts'); /* almacenamos en una variable $image la propiedad imagen que guardamos en la carpeta posts */

        post::create([
            'title' => $this->title,
            'content' => $this->content,
            'image' => $this ->image
        ]);



        /* Una ves ejecutado el metodo SAVE resetea todas estas propiedades */

        $this->reset(['open', 'title', 'content', 'image']);

        /* luego de ejecutar el evento save, emite un evento de reseteo y enviarlo a ShowPost */


        $this ->identificador =rand();

        $this->emit('reseteo');

        /* Emitimos un evento al componente ShowPost con nombre alert */
        
        $this->emit('alert', 'Registro Efectuado...!');

    }

    public function render()
    {
        return view('Livewire.create-post');
    }
}
