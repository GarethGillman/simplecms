<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_title',
        'page_urlslug',
        'page_content',
        'page_seotitle',
        'page_seodesc',
        'page_status'
    ];
}
