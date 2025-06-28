<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    use hasFactory;

    protected $fillable = ['name', 'address', 'credit_balance'];


    /**
     * a supplier has many products
     *
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Procuct::class);
    }
}
