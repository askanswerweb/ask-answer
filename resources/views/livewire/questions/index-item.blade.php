@php /** @var \App\Models\Question $question */ @endphp
<tr>
    <td class="min-w-50px">{{ $question->id }}</td>
    <td class="min-w-150px">{{ $question->title }}</td>
    <td class="min-w-150px">{{ $question->user?->name }}</td>
    <td class="min-w-150px">{!! $question->status?->html() !!}</td>
    <td class="min-w-150px">{{ $question->created_at?->format('Y-m-d') }}</td>
    <td class="min-w-150px">
        <x-dropdown.menu menu="min-w-200px">
            <x-slot name="trigger">
                {{ __('actions.Actions') }}
            </x-slot>

            @if($question->isOpen())
                <x-dropdown.item data-bs-toggle="modal" data-bs-target="#close_{{ $question->id }}">
                    <x-dropdown.link>
                        <x-svg icon="double-switch" class="svg-icon-danger" />
                        <span class="ms-2 fw-bolder">{{ __('actions.Close') }}</span>
                    </x-dropdown.link>
                </x-dropdown.item>

                <x-dropdown.item>
                    <x-dropdown.link :href="route('questions.edit', ['question' => $question])">
                        <x-svg icon="pencil" class="svg-icon-muted" />
                        <span class="ms-2 fw-bolder">{{ __('actions.Edit') }}</span>
                    </x-dropdown.link>
                </x-dropdown.item>

            @endif

            <x-dropdown.item>
                <x-dropdown.link data-bs-target="#delete_{{ $question->id }}" data-bs-toggle="modal">
                    <x-svg icon="trash-solid" class="svg-icon-danger" />
                    <span class="ms-2 fw-bolder">{{ __('actions.Delete') }}</span>
                </x-dropdown.link>
            </x-dropdown.item>
        </x-dropdown.menu>

        <x-widgets.modal id="close_{{ $question->id }}" :title="__('actions.Close')" :subtitle="$question->title">
            <div class="w-100 text-start">
                <label class="form-label required" for="reason_{{ $question->id }}">
                    {{ __('titles.Reason') }}
                </label>
                <textarea
                    id="reason_{{ $question->id }}"
                    wire:model.defer="reason"
                    type="text"
                    class="form-control form-control-solid resize-none @error('reason') is-invalid @enderror"
                    placeholder="{{ __('titles.Reason') }}"
                    autocomplete="off"
                    rows="3"
                    data-kt-autosize="true"
                ></textarea>
                @error('reason')
                <div class="fv-plugins-message-container invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <x-slot name="footer">
                <button class="btn btn-light" data-bs-dismiss="modal">
                    {{ __('actions.Cancel') }}
                </button>
                <button class="btn btn-danger" wire:click="close">
                    {{ __('actions.Close') }}
                </button>
            </x-slot>
        </x-widgets.modal>

        <x-widgets.modal id="delete_{{ $question->id }}" :title="__('actions.Delete')" :subtitle="$question->title">
            <div class="w-100 text-center">
                <h4>{{ __('actions.ConfirmDelete') }}</h4>
                <div class="text-muted fw-semibold fs-5">
                    {{ __('titles.CantRevert') }}
                </div>
            </div>

            <x-slot name="footer">
                <button class="btn btn-light" data-bs-dismiss="modal">
                    {{ __('actions.Cancel') }}
                </button>
                <button class="btn btn-danger" wire:click="delete" data-bs-dismiss="modal">
                    {{ __('actions.Delete') }}
                </button>
            </x-slot>
        </x-widgets.modal>
    </td>
</tr>
