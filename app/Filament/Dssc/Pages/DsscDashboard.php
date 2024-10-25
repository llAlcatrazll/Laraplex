<?php

namespace App\Filament\Dssc\Pages;

use Filament\Pages\Page;

class DsscDashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-c-home';

    protected static string $view = 'filament.dssc.pages.dssc-dashboard';

    protected static ?string $title = 'Dashboard';
}
