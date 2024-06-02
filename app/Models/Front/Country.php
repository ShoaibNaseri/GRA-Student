<?php

namespace App\Models\Front;

use App\Models\Admin\Unidataentry;
use App\Models\Admin\Universityname;
use App\Models\Employee\DataEntry\Programentry;
use App\Models\Student\Personel\Personelinfo;
use App\Models\Student\Student;
use App\Models\University\University;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function universities()
    {
        return $this->hasMany(University::class);
    }
    public function students()
    {
        return $this->hasMany(Student::class);
    }
    public function unidataentries()
    {
        return $this->hasMany(Unidataentry::class);
    }
    public function programentries()
    {
        return $this->hasMany(Programentry::class);
    }
    public function universitynames()
    {
        return $this->hasMany(Universityname::class);
    }
    public function personelinofs()
    {
        return $this->hasMany(Personelinfo::class);
    }
}
