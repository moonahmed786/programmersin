<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'customer_id',
        'service_id',
        'status',
        'is_public',
        'featured_image',
        'showcase_description',
        'start_date',
        'due_date',
        'budget',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = \Illuminate\Support\Str::slug($project->title) . '-' . uniqid();
            }
        });
    }

    protected $casts = [
        'start_date' => 'date',
        'due_date' => 'date',
        'budget' => 'decimal:2',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function employees()
    {
        return $this->belongsToMany(User::class, 'project_employee', 'project_id', 'employee_id')
                    ->withPivot('role');
    }
}
