<?php

namespace App\Http\Livewire\Questions;

use App\Models\Media;
use App\Models\Question;
use Livewire\Component;

class Edit extends Component
{
    use QuestionTrait;

    protected $listeners = ['refreshQuestion' => '$refresh'];

    public function mount(Question $question)
    {
        $this->question = $question;
    }

    public function render()
    {
        return view('livewire.questions.edit', [
            'uploaded_files' => $this->question->getMedia()
        ]);
    }

    public function showMedia($media_id)
    {
        if (!($media = Media::find($media_id)) instanceof Media) {
            return false;
        }

        return response()->download($media->getPath(), $media->file_name);
    }

    public function deleteMedia($media_id)
    {
        Media::where('id', $media_id)->delete();
        $this->deleted('File');
        $this->emitSelf('refreshQuestion');
    }
}
