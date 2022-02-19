<?php

namespace App\Models;

use Altek\Accountant\Contracts\Recordable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model implements Recordable
{
    use HasFactory , SoftDeletes, \Altek\Accountant\Recordable;

    protected $guarded = [];

    public function getProductGainAttribute(){
        return ($this->price - $this->cost) * $this->count;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
