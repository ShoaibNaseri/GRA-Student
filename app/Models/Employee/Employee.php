<?php

namespace App\Models\Employee;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Admin\Unidataentry;
use App\Models\Employee\Bank\EmployeeBank;
use App\Models\Employee\DataEntry\Programentry;
use App\Models\Employee\Wallet\EmployeeWallet;
use App\Models\Student\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'country',
        'image',
        'Dob',
        'resume',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
    public function wallet()
    {
        return $this->hasOne(EmployeeWallet::class);
    }
    public function unidataentries()
    {
        return $this->hasMany(Unidataentry::class);
    }
    public function programentries()
    {
        return $this->hasMany(Programentry::class);
    }
    // public function markAsVerified()
    // {
    //     $this->status = EmployeeStatus::VERIFIED;
    //     $this->save();
    // }
    public function EmployeeWallet()
    {
        return $this->hasOne(EmployeeWallet::class);
    }
    public function employeebank()
    {
        return $this->hasOne(EmployeeBank::class);
    }
}
