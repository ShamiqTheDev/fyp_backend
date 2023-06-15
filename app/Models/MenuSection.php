<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuSection extends Model
{
    use HasFactory;

    public function main_menu()
    {
        return $this->belongsTo(MainMenu::class, 'main_menu_id');
    }

    public function menu_sections()
    {
        return $this->hasMany(SectionLink::class, 'menu_section_id');
    }
}
