<?php

namespace App\Http\Livewire\Media;

use App\Business\Livewire\WithEvents;
use App\Models\Media;
use Livewire\Component;

class IndexItem extends Component
{
    use WithEvents;

    public Media $media;

    public function mount(Media $media)
    {
        $this->media = $media;
    }

    public function render()
    {
        return view('livewire.media.index-item');
    }

    public function delete()
    {
        $this->media->delete();
        $this->deleted('File');
        $this->emitTo('media.index', 'refreshMedia');
    }

    public function show()
    {
        return response()->download($this->media->getPath(), $this->media->file_name);
    }
}
