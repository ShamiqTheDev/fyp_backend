<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionLink extends Model
{
    use HasFactory;

    public function menu_section()
    {
        return $this->belongsTo(MenuSection::class, 'menu_section_id');
    }
}
