<?php

namespace App\Filament\Pages;

use App\Models\User;
use BackedEnum;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Grid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Profile extends Page implements HasForms
{
    use InteractsWithForms;

    protected static bool $shouldRegisterNavigation = false;

    protected static string|BackedEnum|null $navigationIcon = null;

    protected static ?string $navigationLabel = 'Profil Saya';

    protected static ?string $title = 'Profil Saya';

    protected static ?string $slug = 'profile';

    protected string $view = 'filament.pages.profile';

    public ?array $data = [];

    protected function getFormSchema(): array
    {
        return [
            Grid::make(2)->schema([
                TextInput::make('name')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->label('Email')
                    ->disabled()
                    ->dehydrated(false),
            ]),
            Grid::make(2)->schema([
                TextInput::make('password')
                    ->label('Password baru')
                    ->password()
                    ->maxLength(255)
                    ->helperText('Kosongkan jika tidak ingin mengubah password.'),
                TextInput::make('password_confirmation')
                    ->label('Konfirmasi password')
                    ->password()
                    ->same('password')
                    ->dehydrated(false),
            ]),
        ];
    }

    protected function getFormModel(): User
    {
        /** @var User $user */
        $user = Auth::user();

        return $user;
    }

    protected function getFormStatePath(): string
    {
        return 'data';
    }

    public function mount(): void
    {
        /** @var User $user */
        $user = Auth::user();

        $this->form->fill([
            'name' => $user->name,
            'email' => $user->email,
        ]);
    }

    public function save(): void
    {
        /** @var User $user */
        $user = Auth::user();

        $state = $this->form->getState();

        $user->name = $state['name'] ?? $user->name;

        if (! empty($state['password'] ?? null)) {
            $user->password = Hash::make($state['password']);
        }

        $user->save();

        Notification::make()
            ->title('Profil berhasil diperbarui')
            ->success()
            ->send();
    }
}
