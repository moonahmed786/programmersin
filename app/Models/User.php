<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'role', 'phone', 'avatar', 'position', 'bio', 'is_active', 'ai_credits'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
            'is_active'         => 'boolean',
            'ai_credits'        => 'integer',
        ];
    }

    public function isSuperAdmin(): bool  { return $this->role === 'superadmin'; }
    public function isEmployee(): bool    { return $this->role === 'employee'; }
    public function isCustomer(): bool    { return $this->role === 'customer'; }

    public function dashboardRoute(): string
    {
        return match($this->role) {
            'superadmin' => route('admin.dashboard'),
            'employee'   => route('employee.dashboard'),
            default      => route('customer.dashboard'),
        };
    }

    public function projects()
    {
        if ($this->isCustomer()) {
            return $this->hasMany(Project::class, 'customer_id');
        }
        return $this->belongsToMany(Project::class, 'project_employee', 'employee_id');
    }

    public function customerProjects() { return $this->hasMany(Project::class, 'customer_id'); }
    public function employeeProjects() { return $this->belongsToMany(Project::class, 'project_employee', 'employee_id'); }
    public function inquiries()        { return $this->hasMany(Inquiry::class, 'assigned_to'); }
}
