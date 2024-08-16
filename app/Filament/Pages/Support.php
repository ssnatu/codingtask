<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Support extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.support';

    protected static ?string $title = 'Request for support';

    protected static ?string $navigationLabel = 'Request support';
}
