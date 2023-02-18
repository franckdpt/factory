<?php
 
namespace App\Filament\Pages;
 
use Filament\Pages\Dashboard as BasePage;
use Illuminate\Support\Facades\Auth;

class Dashboard extends BasePage
{
    
    public function getTitle(): string
    {
        return 'Welcome, '.Auth::user()->name;
    }

    protected function getColumns(): int | array
    {
        return 3;
    }
}