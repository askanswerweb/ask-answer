<div class="container-fluid">
    <x-breadcrumb.container :header="__('titles.Messages')">
        <x-breadcrumb.link :href="auth()->user()->isAdmin() ? route('home') : route('question.feeds')">
            {{ __('titles.Dashboard') }}
        </x-breadcrumb.link>

        <x-breadcrumb.bullet />

        <x-breadcrumb.muted>{{ __('titles.Messages') }}</x-breadcrumb.muted>
    </x-breadcrumb.container>

    <div id="kt_app_content" class="mb-5">
        <div id="kt_app_content_container" class="">
            <div class="d-flex flex-column flex-lg-row">
                <div class="flex-column flex-lg-row-auto w-100 w-lg-300px w-xl-400px mb-10 mb-lg-0">
                    <div class="card card-flush" id="users_card">
                        <div class="card-header pt-7" id="kt_chat_contacts_header">
                            <div class="w-100 d-flex-between mb-2">
                                <x-tooltip :text="__('titles.FirstPage')">
                                    <x-livewire.action wire-click="resetPage" class="btn btn-sm btn-icon btn-light"
                                                       :with-text="false">
                                        <x-svg icon="home" />
                                    </x-livewire.action>
                                </x-tooltip>

                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#start_chat">
                                    {{ __('titles.StartChat') }}
                                </button>
                            </div>
                            <form class="w-100 position-relative" autocomplete="off">
                                <input type="text" class="form-control form-control-solid"
                                       wire:model.debounce.600ms="search" placeholder="{{ __('actions.Search') }}">
                            </form>
                        </div>

                        <div class="card-body pt-5" id="kt_chat_contacts_body">
                            <div class="scroll-y me-n5 pe-5 h-200px h-lg-auto" data-kt-scroll="true"
                                 data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                                 data-kt-scroll-dependencies="#kt_header, #kt_app_header, #kt_toolbar, #kt_app_toolbar, #kt_footer, #kt_app_footer, #kt_chat_contacts_header"
                                 data-kt-scroll-wrappers="#kt_content, #kt_app_content, #kt_chat_contacts_body"
                                 data-kt-scroll-offset="5px" style="min-height: 200px; max-height: 356px;">

                                @if($list->isEmpty())
                                    <div class="card card-flush">
                                        <div class="card-body">
                                            <div class="card-px text-center mb-0">
                                                <h2 class="fs-2 fw-bold">{{ __('titles.NoUsers') }}</h2>
                                            </div>

                                            <div class="text-center px-4">
                                                <img class="mw-100 mh-200px" alt=""
                                                     src="{{ asset('assets/media/illustrations/sigma-1/15.png') }}">
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    @foreach($list as $user)
                                        @livewire('chats.index-item', ['user' => $user, 'selected' => $selected], key(microtime()))
                                    @endforeach
                                @endif

                                <x-widgets.modal id="start_chat" :title="__('titles.StartChat')">
                                    <div class="w-100 text-center">
                                        <div class="row mb-5 mb-xl-10 text-start fw-semibold">
                                            <label>{{ __('titles.ChatReceiver') }}</label>
                                            <x-filters.select2
                                                id="receiver_id"
                                                model="receiver_id"
                                                url="chat-receiver"
                                                :title="__('titles.ChatReceiver')"
                                                :clear="false"
                                            />
                                        </div>
                                    </div>

                                    <x-slot name="footer">
                                        <button class="btn btn-light" data-bs-dismiss="modal">
                                            {{ __('actions.Cancel') }}
                                        </button>
                                        <button class="btn btn-primary" wire:click="start" data-bs-dismiss="modal">
                                            {{ __('actions.Start') }}
                                        </button>
                                    </x-slot>
                                </x-widgets.modal>
                            </div>

                            @if($list->isNotEmpty())
                                {!! $list->links() !!}
                            @endif
                        </div>
                    </div>
                </div>

                <div class="flex-lg-row-fluid ms-lg-5">
                    <div class="card" id="kt_chat_messenger">
                        <div class="card-header" id="kt_chat_messenger_header">
                            <div class="card-title">
                                <div class="d-flex justify-content-center flex-column me-3">
                                    <a href="javascript:void(0);"
                                       class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 mb-2 lh-1">
                                        {{ $selected_user?->name }}
                                    </a>

                                    <div class="mb-0 lh-1">
                                        <span class="fs-7 fw-semibold text-muted">
                                            {{ $selected_user?->username }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Card header-->

                        <div class="card-body">
                            <div class="scroll-y me-n5 pe-5 h-300px" id="kt_chat_messenger_body"
                                 wire:loading.delay.class="opacity-50">
                                @if(!count($messages))
                                    <div class="card card-flush">
                                        <div class="card-body">
                                            <div class="card-px text-center mb-0">
                                                <h2 class="fs-2 fw-bold">{{ __('titles.NoMessages') }}</h2>
                                            </div>

                                            <div class="text-center px-4">
                                                <img class="mw-100 mh-200px" alt=""
                                                     src="{{ asset('assets/media/illustrations/sketchy-1/1.png') }}">
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    @foreach($messages as $message)
                                        @php /** @var \App\Models\ChatMessage $message */ @endphp
                                        @if($message->sender_id == auth()->id())
                                            <div class="d-flex justify-content-end mb-10">
                                                <div class="d-flex flex-column align-items-end">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <div class="me-3">
                                                            <span class="text-muted fs-7 mb-1">
                                                                {{ $message->getCreatedAtForHumans() }}
                                                            </span>
                                                            <a href="javascript:void(0);"
                                                               class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">
                                                                {{ __('titles.You') }}
                                                            </a>
                                                        </div>

                                                        <div class="symbol symbol-35px symbol-circle ">
                                                            <span
                                                                class="symbol-label  bg-light-danger text-danger fs-6 fw-bolder ">
                                                                {{ $message->sender?->getFirstLetter() }}
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end pre-wrap"
                                                        data-kt-element="message-text">
                                                        {!! $message->content !!}
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="d-flex justify-content-start mb-10 ">
                                                <div class="d-flex flex-column align-items-start">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <div class="symbol  symbol-35px symbol-circle ">
                                                            <span
                                                                class="symbol-label  bg-light-danger text-danger fs-6 fw-bolder ">
                                                                {{ $message->sender?->getFirstLetter() }}
                                                            </span>
                                                        </div>

                                                        <div class="ms-3">
                                                            <a href="#"
                                                               class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">
                                                                {{ $message->sender?->firstName() }}
                                                            </a>
                                                            <span class="text-muted fs-7 mb-1">
                                                                {{ $message->getCreatedAtForHumans() }}
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start"
                                                        data-kt-element="message-text">
                                                        {!! $message->content !!}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach

                                    @if($loadAmount < $totalMessages)
                                        <div class="d-flex-center w-100">
                                            <x-livewire.action class="btn btn-primary btn-sm" wire-click="loadMore">
                                                {{ __('actions.LoadMore') }}
                                            </x-livewire.action>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>

                        <div class="card-footer pt-4" id="kt_chat_messenger_footer">
                            <textarea
                                class="form-control form-control-flush resize-none mb-3"
                                rows="1"
                                placeholder="{{ __('titles.TypeMessage') }}"
                                wire:model.defer="content"
                                wire:keydown.enter="send"></textarea>

                            <div class="d-flex flex-stack">
                                <div class="d-flex align-items-center me-2">
                                    <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button"
                                            data-bs-toggle="tooltip" aria-label="Coming soon"
                                            data-bs-original-title="Coming soon" data-kt-initialized="1">
                                        <x-svg icon="attached" />
                                    </button>
                                </div>

                                <button class="btn btn-primary" type="button" wire:click="send">
                                    {{ __('actions.Send') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script type="module">
            document.addEventListener('new_message', () => {
                const objDiv = document.getElementById("kt_chat_messenger_body");
                objDiv.scrollTop = 0;
            })

            document.addEventListener('DOMContentLoaded', () => {
                const objDiv = document.getElementById("kt_chat_messenger_body");
                objDiv.scrollTop = 0;

                // const firstRecord = document.getElementById('first_record');
                // const options = {
                //     root: null,
                //     threshold: 1,
                //     rootMargin: '0px'
                // };
                //
                // const observer = new IntersectionObserver((entries, observer) => {
                //     entries.forEach(entry => {
                //         if (entry.isIntersecting) {
                //         @this.loadMore();
                //         }
                //     })
                // })
                //
                // observer.observe(firstRecord)
            })
        </script>
    @endpush
</div>
