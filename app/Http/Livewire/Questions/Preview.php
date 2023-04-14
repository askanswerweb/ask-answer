<?php

namespace App\Http\Livewire\Questions;

use App\Models\Media;
use App\Models\Question;
use Livewire\Component;

class Preview extends Component
{
    public Question $question;
    public ?Media $firstMedia;

    public function mount(Question $question)
    {
        $this->question = $question;
        $this->firstMedia = $this->question->getMedia()->first();
    }

    public function render()
    {
        return view('livewire.questions.preview');
    }

    public function download($media_id)
    {
        $media = Media::find($media_id);
        return response()->download($media->getPath(), $media->file_name);
    }
}
