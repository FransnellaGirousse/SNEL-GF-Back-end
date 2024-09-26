<?php  

namespace App\Models;  

use Illuminate\Database\Eloquent\Factories\HasFactory;  
use Illuminate\Database\Eloquent\Model;  
use Illuminate\Notifications\Notifiable;  
use Laravel\Socialite\Facades\Socialite;  
use Illuminate\Support\Str; 


class Register extends Model  
{  
    use HasFactory, Notifiable;  

    protected $table = 'users';  

    protected $fillable = [  
        'firstname',  
        'lastname',  
        'email',  
        'password',  
        'tel',  
    ];  

    protected $hidden = [  
        'password',  
        'remember_token',  
    ];  

    public function setPasswordAttribute($value)  
    {  
        $this->attributes['password'] = bcrypt($value);  
    }  

    public static function createFromGoogle($googleUser)  
    {  
        return self::firstOrCreate(  
            ['email' => $googleUser->getEmail()],   
            [  
                'firstname' => $googleUser->user['given_name'], 
                'lastname' => $googleUser->user['family_name'], 
                'tel' => null, 
                'password' => bcrypt(Str::random(16)),   
            ] 
        );  
    }  
}