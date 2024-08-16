<?php

namespace App\Livewire;

use App\Models\Support;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Mews\Captcha\Captcha;
use Livewire\Component;

class SupportRequest extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];
    
    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->required(),
                TextInput::make('subject')
                    ->required(),
                Textarea::make('message')
                    ->required()
                    ->minLength(6)
                    ->maxLength(100)
                    ->rows(5),
            ])
            ->statePath('data');
    }
    
    public function submitRequest(): void
    {
        try {
            Support::create($this->form->getState());
            session()->flash('success', 'Thank you. Your request has been sent.');
        } catch (\Exception $ex) {
            session()->flash('error', 'Something goes wrong!!');
        }

        $this->resetForm();
    }

    private function resetForm()
    {
        $this->form->fill();
    }

    public function render()
    {
        return view('livewire.support-request');
    }
}
