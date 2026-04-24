<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'parent_id',
        'location',
        'order',
        'is_active',
    ];

    protected static function boot()
    {
        parent::boot();
        $flush = fn () => Cache::forget('menus.header') && Cache::forget('menus.footer');
        static::saved($flush);
        static::deleted($flush);
    }

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id')->orderBy('order');
    }

    public function getChildrenAttribute()
    {
        if ($this->relationLoaded('children')) {
            return $this->getRelation('children');
        }
        return $this->children()->get();
    }

    /**
     * Scope a query to only include header items.
     */
    public function scopeHeader($query)
    {
        return $query->where('location', 'header')->whereNull('parent_id')->where('is_active', true)->orderBy('order');
    }

    /**
     * Scope a query to only include footer items.
     */
    public function scopeFooter($query)
    {
        return $query->where('location', 'footer')->whereNull('parent_id')->where('is_active', true)->orderBy('order');
    }
}
