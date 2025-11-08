<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Page extends Model
{
    use HasFactory;
        
    protected $table="page";
    protected $fillable=[
         'name',
        'link',
        'dropdown_section',
        'section_type',
        'content',
        'settings',
        'styling',
        'active',
        'order',
    ];

    protected $casts = [
        'settings' => 'array',
        'styling' => 'array',
        'active' => 'boolean',
    ];
}
