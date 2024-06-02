<?php

namespace App\Models\Student;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\student\AccountVerifiy;
use App\Models\Employee\Employee;
use App\Models\Front\Country;
use App\Models\Student\Application\Application;
use App\Models\Student\Credential\Credential;
use App\Models\Student\Education\Bachelor;
use App\Models\Student\Education\Master;
use App\Models\Student\Education\School;
use App\Models\Student\Identification\Birthcertificate;
use App\Models\Student\Identification\Nationalid;
use App\Models\Student\Identification\Passport;
use App\Models\Student\LanguageCert\Languagecertificate;
use App\Models\Student\Payment\Dueamount;
use App\Models\Student\Payment\Refund\Refound;
use App\Models\Student\Payment\Transaction\Transaction;
use App\Models\Student\Payment\Transaction\Wisetransaction;
use App\Models\Student\Personel\Bankinfo;
use App\Models\Student\Personel\Personelinfo;
use App\Models\Student\Payment\Wallet\Wallet;
use App\Models\Student\Work\Workinfo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Student extends Authenticatable
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
        'password',
        'image',
        'country_id',
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
    // public function markStatusAsVerified()
    // {
    //     $this->status = AccountVerifiy::VERIFIED;
    //     $this->save();
    // }
    // public function markStatusAsUnverified()
    // {
    //     $this->status = AccountVerifiy::UNVERIFIED;
    //     $this->save();
    // }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function dueamounts()
    {
        return $this->hasMany(Dueamount::class);
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    public function refounds()
    {
        return $this->hasMany(Refound::class);
    }
    public function wisetransactions()
    {
        return $this->hasMany(Wisetransaction::class);
    }
    public function statuses()
    {
        return $this->hasOne(Studentstatus::class);
    }
    public function findById($id)
    {
        return Student::where('student_id', $id);
    }
    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
    public function brithCertificate()
    {
        return $this->hasOne(Birthcertificate::class);
    }
    public function nationalid()
    {
        return $this->hasOne(Nationalid::class);
    }
    public function passport()
    {
        return $this->hasOne(Passport::class);
    }
    public function school()
    {
        return $this->hasOne(School::class);
    }
    public function bachelor()
    {
        return $this->hasOne(Bachelor::class);
    }
    public function master()
    {
        return $this->hasOne(Master::class);
    }
    public function bank()
    {
        return $this->hasOne(Bankinfo::class);
    }
    public function personal()
    {
        return $this->hasOne(Personelinfo::class);
    }
    public function creden()
    {
        return $this->hasOne(Credential::class);
    }
    public function experiences()
    {
        return $this->hasMany(Workinfo::class);
    }
    public function lcts()
    {
        return  $this->hasMany(Languagecertificate::class);
    }
}
