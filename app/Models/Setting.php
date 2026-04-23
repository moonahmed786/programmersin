<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'group',
        'label',
        'type',
    ];

    /**
     * Get a setting value by key.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function get(string $key, $default = null)
    {
        return Cache::rememberForever("setting.{$key}", function () use ($key, $default) {
            $setting = self::where('key', $key)->first();
            return $setting ? $setting->value : $default;
        });
    }

    /**
     * Get the logo URL properly handled (uploaded vs default).
     *
     * @return string
     */
    public static function logoUrl()
    {
        $logo = self::get('site_logo');
        
        if (!$logo) {
            return asset('uploads/assets/logo.svg');
        }

        // If it's a storage path (uploaded)
        if (str_starts_with($logo, 'settings/') || str_starts_with($logo, 'logos/')) {
            $path = 'storage/' . $logo;
            $fullPath = public_path($path);
            
            // Add cache busting based on file modification time
            $version = file_exists($fullPath) ? filemtime($fullPath) : time();
            return asset($path) . '?v=' . $version;
        }

        // If it's a public path
        return asset($logo);
    }

    /**
     * Set a setting value by key.
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public static function set(string $key, $value)
    {
        self::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }

    protected static function booted()
    {
        static::created(function ($setting) {
            Cache::forget("setting.{$setting->key}");
        });

        static::updated(function ($setting) {
            Cache::forget("setting.{$setting->key}");
        });

        static::deleted(function ($setting) {
            Cache::forget("setting.{$setting->key}");
        });
    }
}
