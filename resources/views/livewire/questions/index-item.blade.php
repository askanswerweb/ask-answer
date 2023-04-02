@php /** @var \App\Models\Question $question */ @endphp
<tr>
    <td>{{ $question->id }}</td>
    <td>{{ $question->title }}</td>
    <td>
        {!! $question->status?->html() !!}
    </td>
    <td>{{ $question->created_at?->format('Y-m-d') }}</td>
    <td>
        <x-dropdown.menu menu="min-w-200px">
            <x-slot name="trigger">
                {{ __('actions.Actions') }}
            </x-slot>

            @if($question->isOpen())
                <x-dropdown.item data-bs-toggle="modal" data-bs-target="#question_status_{{ $question->id }}">
                    <x-dropdown.link>
                        <x-svg icon="double-switch" class="svg-icon-danger" />
                        <span class="ms-2 fw-bolder">{{ __('actions.Deactivate') }}</span>
                    </x-dropdown.link>
                </x-dropdown.item>
            @endif

            <x-dropdown.item>
                <x-dropdown.link :href="route('questions.edit', ['question' => $question])">
                    <x-svg icon="pencil" class="svg-icon-muted" />
                    <span class="ms-2 fw-bolder">{{ __('actions.Edit') }}</span>
                </x-dropdown.link>
            </x-dropdown.item>
        </x-dropdown.menu>

        <x-widgets.modal id="question_status_{{ $question->id }}">
            <x-slot name="title">
                {{ __('titles.ActivateQuestion') }}
            </x-slot>

            <x-slot name="subtitle">
                {{ $question->name }}
            </x-slot>

            <div class="w-100 text-center">
                <h4>
                    {{ __('titles.ConfirmActivateQuestion') }}
                </h4>
            </div>

            <x-slot name="footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                    {{ __('actions.Close') }}
                </button>
                <button wire:click="changeActivation" data-bs-dismiss="modal"
                        class="btn btn-danger">
                    {{ __('actions.Activate') }}
                </button>
            </x-slot>
        </x-widgets.modal>
    </td>
</tr>
