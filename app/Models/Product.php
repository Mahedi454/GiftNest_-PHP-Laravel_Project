<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\File;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'badge',
        'image',
        'description',
        'category_id',
        'stock',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'stock' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::deleting(function (Product $product): void {
            $product->deleteImageFile();
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function deleteImageFile(): void
    {
        if (! $this->image) {
            return;
        }

        $imagePath = public_path('images/products/'.$this->image);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
    }
}
