<?php

namespace App\Http\Livewire\Media;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class Index extends Component
{
    public Model $model;

    protected $listeners = ['refreshMedia' => '$refresh'];

    public function mount(Model $model)
    {
        $this->model = $model;
    }

    public function render()
    {
        return view('livewire.media.index', [
            'medias' => $this->model->getMedia()
        ]);
    }
}
