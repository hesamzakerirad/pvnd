<?php

namespace App\Filament\User\Widgets;

use App\Models\Link;
use App\Rules\NotAlreadyShortened;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Widgets\Widget;

class CreateInstantShortLink extends Widget implements HasForms
{
    use InteractsWithForms;

    protected string $view = 'filament.user.widgets.create-instant-short-link';

    protected int|string|array $columnSpan = 'full';

    public array $data = [];

    public ?Link $result = null;

    protected function getFormStatePath(): string
    {
        return 'data';
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('link')
                ->label(__('attributes.create_instant_short_link'))
                ->url()
                ->rules([
                    new NotAlreadyShortened,
                ])
                ->required(),
        ];
    }

    public function submit(): void
    {
        $this->form->validate();

        $link = Link::create([
            'user_id' => auth()->id(),
            'location' => $this->data['link'],
        ]);

        $this->form->fill([
            'link' => $link->getFull(),
        ]);
    }
}
