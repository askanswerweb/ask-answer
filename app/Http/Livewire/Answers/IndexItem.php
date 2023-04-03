<?php

namespace App\Http\Livewire\Answers;

use App\Business\Livewire\WithEvents;
use App\Models\Answer;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class IndexItem extends Component
{
    use WithEvents, WithFileUploads;

    public Answer $answer;
    public $media_count;
    public $files;

    protected array $rules = ['answer.content' => 'required'];

    public function mount(Answer $answer)
    {
        $this->answer = $answer;
        $this->media_count = $this->answer->media_count;
    }

    public function render()
    {
        return view('livewire.answers.index-item');
    }

    public function save()
    {
        $this->validate();

        $this->answer->save();

        $this->edited('Answer');
        $this->dispatchBrowserEvent('saved_content_' . $this->answer->id);
    }

    public function addFiles()
    {
        if (!empty($this->files)) {
            foreach ($this->files as $file) {
                $this->answer->addMedia($file)->setFileName(Str::random(10))->toMediaCollection();
            }
        }

        $this->saved();
        $this->emitTo('media.index', 'refreshMedia');
    }
}
