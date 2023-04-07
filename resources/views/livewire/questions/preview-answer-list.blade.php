<div>
    @foreach($answers as $answer)
        @livewire('questions.preview-answer-item', ['answer' => $answer], key("answer_{$answer->id}_" . microtime()))
    @endforeach
</div>
