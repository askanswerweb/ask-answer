@php use App\Business\Utilities\Strings; @endphp
<section>
    <div id="kt_app_toolbar" class="app-toolbar container-fluid py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="container-fluid d-flex flex-stack ">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    {{ __('titles.OpenQuestions') }}
                </h1>
            </div>

            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <!--begin::Filter menu-->
                <div class="m-0">
                    <!--begin::Menu toggle-->
                    <a href="#"
                       class="btn btn-sm btn-flex bg-body btn-color-gray-700 btn-active-color-primary fw-bold"
                       data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <i class="ki-duotone ki-filter fs-6 text-muted me-1"><span
                                class="path1"></span><span class="path2"></span></i>
                        Filter
                    </a>
                    <!--end::Menu toggle-->


                    <!--begin::Menu 1-->
                    <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                         id="kt_menu_642b6d0cf0ae3">
                        <!--begin::Header-->
                        <div class="px-7 py-5">
                            <div class="fs-5 text-dark fw-bold">Filter Options</div>
                        </div>
                        <!--end::Header-->

                        <!--begin::Menu separator-->
                        <div class="separator border-gray-200"></div>
                        <!--end::Menu separator-->

                        <div class="px-7 py-5">
                            <div class="mb-5">
                                <label class="form-label fw-semibold" for="status">
                                    {{ __('titles.Status') }}
                                </label>

                                <div>
                                    <select id="status" class="form-select form-select-solid" wire:model.defer="status">
                                        <option value="">{{ __('titles.All') }}</option>
                                        <option value="open">{{ __('states.open') }}</option>
                                        <option value="closed">{{ __('states.closed') }}</option>
                                        <option value="resolved">{{ __('states.resolved') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-5">
                                <label class="form-label fw-semibold" for="branches">
                                    {{ __('titles.Branches') }}
                                </label>

                                <x-filters.select2
                                    id="branches"
                                    model="branch_id"
                                    url="branches"
                                    :title="__('titles.Branches')"
                                    :selected-id="$branch?->id"
                                    :selected-text="$branch?->name"
                                />
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="reset" wire:click="resetFilters"
                                        class="btn btn-sm btn-light btn-active-light-primary me-2"
                                        data-kt-menu-dismiss="true">
                                    {{ __('actions.Reset') }}
                                </button>

                                <button type="button" class="btn btn-sm btn-primary" wire:click="filter"
                                        data-kt-menu-dismiss="true">
                                    {{ __('actions.Apply') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


                <a href="{{ route('questions.create') }}" class="btn btn-sm fw-bold btn-primary">
                    {{ __('actions.Create') }}
                </a>
            </div>
        </div>
    </div>

    <div id="kt_app_content_container" class="container-fluid">
        <div class="d-flex flex-row flex-wrap flex-lg-nowrap">
            <div class="d-lg-flex flex-column flex-lg-row-auto w-100 w-lg-325px">

                <div class="card mb-5 mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body pt-15 px-0">
                        <!--begin::Member-->
                        <div class="d-flex flex-column text-center mb-9 px-9">
                            <!--begin::Photo-->
                            <div class="symbol symbol-80px symbol-lg-150px mb-4">
                                <x-widgets.user-logo :user="auth()->user()" class="fs-1" />
                            </div>

                            <div class="text-center">
                                <a href="javascript:void(0);"
                                   class="text-gray-800 fw-bold text-hover-primary fs-4">
                                    {{ auth()->user()->name }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-100 flex-lg-row-fluid mx-lg-5">
                <div class="mb-10" id="kt_social_feeds_posts">
                    @if($list->isEmpty())
                        <div class="card ">
                            <div class="card-body p-0">
                                <div class="card-px text-center py-20 my-10">
                                    <h2 class="fs-2x fw-bold mb-10">
                                        {{ __('titles.Welcome') }}
                                    </h2>

                                    <p class="text-gray-400 fs-4 fw-semibold mb-10">
                                        {{ __('titles.NoQuestionsYet') }}
                                        <br>
                                        {{ __('titles.CreateFirstQuestion') }}
                                    </p>

                                    <a href="{{ route('questions.create') }}" class="btn btn-primary">
                                        {{ __('titles.AddQuestion') }}
                                    </a>
                                </div>

                                <div class="text-center px-4">
                                    <img class="mw-100 mh-300px" alt=""
                                         src="{{ asset('assets/media/illustrations/sketchy-1/2.png') }}">
                                </div>
                            </div>
                        </div>
                    @else
                        @foreach($list as $item)
                            @livewire('feeds.index-item', ['question' => $item], key(microtime()))
                        @endforeach
                    @endif
                </div>

                <div class="d-flex flex-center">
                    {!! $list->links() !!}
                </div>
            </div>

            <div class="d-lg-flex flex-column flex-lg-row-auto w-lg-325px"
                 data-kt-drawer="true"
                 data-kt-drawer-name="end-sidebar"
                 data-kt-drawer-activate="{default: true, lg: false}"
                 data-kt-drawer-overlay="true"
                 data-kt-drawer-width="{default:'200px', '250px': '300px'}"
                 data-kt-drawer-direction="end"
                 data-kt-drawer-toggle="#kt_social_end_sidebar_toggle"
            >

                @if(auth()->user()->isAdmin())
                    <div class="card mb-5 mb-xl-8">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-dark">
                                    {{ __('titles.TheMostInteractive') }}
                                </span>
                            </h3>
                        </div>

                        <div class="card-body pt-5">
                            @if(!empty($topUsers))
                                @foreach($topUsers as $user)
                                    <div class="d-flex flex-stack mb-3">
                                        <div class="symbol symbol-40px me-5">
                                            <x-widgets.symbol color="info" class="symbol-40px"
                                                              title="{{ $user['name'] }}">
                                                {{ strtoupper(Strings::firstLetter($user['name'])) }}
                                            </x-widgets.symbol>
                                        </div>

                                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                            <div class="flex-grow-1 me-2">
                                                <a href="javascript:void(0);"
                                                   class="text-gray-800 text-hover-primary fs-6 fw-bold">
                                                    {{ strtoupper(Strings::firstWord($user['name'])) }}
                                                </a>

                                                <span class="text-muted fw-semibold d-block fs-7">
                                                    {{ number_format($user['questions']) }} {{ __('titles.Questions') }}
                                                </span>
                                            </div>

                                            <a href="{{ route('users.edit', ['user' => $user['id']]) }}"
                                               class="btn btn-sm btn-light fs-8 fw-bold" target="_blank">
                                                {{ __('actions.Preview') }}
                                            </a>
                                        </div>
                                    </div>

                                    @if(!$loop->last)
                                        <div class="separator separator-dashed my-4"></div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                @else
                    <div class="card mb-5 mb-xl-8">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-dark">
                                    {{ __('titles.LastQuestions') }}
                                </span>
                            </h3>
                        </div>

                        <div class="card-body pt-5">
                            @if(is_iterable($lastQuestions))
                                @foreach($lastQuestions as $lastQuestion)
                                    <div class="d-flex flex-stack mb-3">
                                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                            <div class="flex-grow-1">
                                                <a href="javascript:void(0);"
                                                   class="text-gray-800 text-hover-primary fs-6 fw-bold">
                                                    {{ strtoupper(Strings::firstWord($lastQuestion['title'])) }}
                                                </a>
                                            </div>

                                            <a href="{{ route('questions.edit', ['question' => $lastQuestion['id']]) }}"
                                               class="btn btn-sm btn-light fs-8 fw-bold" target="_blank">
                                                {{ __('actions.Preview') }}
                                            </a>
                                        </div>
                                    </div>

                                    @if(!$loop->last)
                                        <div class="separator separator-dashed my-4"></div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
        <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
        <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
        <script src="{{ asset('assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
        <script src="{{ asset('assets/js/spinner-livewire.js') }}"></script>
    @endpush
</section>
