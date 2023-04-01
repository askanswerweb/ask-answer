<?php

namespace App\Business\Livewire;

trait WithEvents
{
    public function saved($type = 'success'): void
    {
        $this->dispatchBrowserEvent($type, __('validation.DataSavedSuccessfully'));
    }

    public function failed($type = 'error', $message = null): void
    {
        $this->dispatchBrowserEvent($type, $message ?: __('validation.DataFailedToSave'));
    }

    public function created($attribute, array $options = []): void
    {
        $options = collect($options);
        $type = $options->get('type', 'success');
        $source = $options->get('source', 'titles');

        $this->dispatchBrowserEvent($type, __('validation.AttributeCreated', ['attribute' => __("$source.$attribute")]));
    }

    public function edited($attribute, array $options = []): void
    {
        $options = collect($options);
        $type = $options->get('type', 'success');
        $source = $options->get('source', 'titles');

        $this->dispatchBrowserEvent($type, __('validation.AttributeUpdated', ['attribute' => __("$source.$attribute")]));
    }

    public function added($attribute, array $options = []): void
    {
        $options = collect($options);
        $type = $options->get('type', 'success');
        $source = $options->get('source', 'titles');

        $this->dispatchBrowserEvent($type, __('validation.AttributeAdded', ['attribute' => __("$source.$attribute")]));
    }

    public function deleted($attribute, array $options = []): void
    {
        $options = collect($options);
        $type = $options->get('type', 'success');
        $source = $options->get('source', 'titles');

        $this->dispatchBrowserEvent($type, __('validation.AttributeDeleted', ['attribute' => __("$source.$attribute")]));
    }

    public function required($attribute)
    {
        $this->dispatchBrowserEvent('error', __('validation.required', ['attribute' => $attribute]));
    }
}
