<?php

declare(strict_types=1);

namespace CodingMatters\User\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;

final class User extends Authenticatable
{
    protected $fillable = ['api_token'];

    public function token() : string
    {
        return $this->api_token;
    }
}
