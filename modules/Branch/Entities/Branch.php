<?php

declare(strict_types=1);

namespace CodingMatters\Branch\Entities;

use Illuminate\Database\Eloquent\Model;

final class Branch extends Model
{
    protected $fillable = ['name', 'slug', 'location'];

    protected $hidden = ['id', 'slug', 'created_at', 'updated_at'];
}
