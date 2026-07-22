<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductionOrder extends Model
{
   use HasFactory;

    protected $fillable = [
        'production_date',
        'product_id',
        'quantity',
    ];

    // Relasi ke tabel Product
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}