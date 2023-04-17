<?php

namespace App\Business\Livewire;

trait WithEvents
{
    protected function saved($type = 'success'): void
    {
        $this->dispatchBrowserEvent($type, __('validation.DataSavedSuccessfully'));
    }

    protected function failed($type = 'error', $message = null): void
    {
        $this->dispatchBrowserEvent($type, $message ?: __('validation.DataFailedToSave'));
    }

    protected function created($attribute, array $options = []): void
    {
        $options = collect($options);
        $type = $options->get('type', 'success');
        $source = $options->get('source', 'titles');

        $this->dispatchBrowserEvent($type, __('validation.AttributeCreated', ['attribute' => __("$source.$attribute")]));
    }

    protected function edited($attribute, array $options = []): void
    {
        $options = collect($options);
        $type = $options->get('type', 'success');
        $source = $options->get('source', 'titles');

        $this->dispatchBrowserEvent($type, __('validation.AttributeUpdated', ['attribute' => __("$source.$attribute")]));
    }

    protected function added($attribute, array $options = []): void
    {
        $options = collect($options);
        $type = $options->get('type', 'success');
        $source = $options->get('source', 'titles');

        $this->dispatchBrowserEvent($type, __('validation.AttributeAdded', ['attribute' => __("$source.$attribute")]));
    }

    protected function deleted($attribute, array $options = []): void
    {
        $options = collect($options);
        $type = $options->get('type', 'success');
        $source = $options->get('source', 'titles');

        $this->dispatchBrowserEvent($type, __('validation.AttributeDeleted', ['attribute' => __("$source.$attribute")]));
    }

    protected function required($attribute)
    {
        $this->dispatchBrowserEvent('error', __('validation.required', ['attribute' => $attribute]));
    }

    protected function cannotDelete($type = 'error')
    {
        $this->dispatchBrowserEvent($type, __('validation.CannotDelete'));
    }
}
