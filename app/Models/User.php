<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $guarded = [
        'id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function sekolah(){
        return $this->belongsTo(Sekolah::class);
    }

    public function profile_user(){
        return $this->hasOne(profile_user::class, 'user_id');
    }

    public function log(){
        return $this->hasMany(Log::class);
    }

    private static function parseDataToArray($datas){
        $return = [];

        foreach ($datas as $key => $data) {
            array_push($return, $data->id);
        }

        return $return;
    }

    public function scopeFilterUser($query, array $filter){
        $query->when($filter['search'] ?? false, function($query, $filter){
            return $query->where('profile_users.name', 'like', '%' . $filter . '%')
                        ->orWhere('users.email', 'like', '%' . $filter . '%')
                        ->orWhere('users.nip', 'like', '%' . $filter . '%');
        });
    }

    public static function getUser($role, $detail = false, $paginate = false, $filter = ['search' => '']){
        $users = User::join('profile_users', 'profile_users.user_id', 'users.id')
                        ->when($detail, function($query) use ($detail){
                            $query->select('users.email', 'users.profil', 'users.nip','profile_users.jk', 'profile_users.tempat_lahir', 'profile_users.tanggal_lahir', 'profile_users.jalan', 'profile_users.name', 'ref_provinsis.nama as provinsi', 'ref_kabupatens.nama as kabupaten', 'ref_kecamatans.nama as kecamatan', 'ref_kelurahans.nama as kelurahan', 'ref_agamas.nama as agama')
                            ->join('ref_agamas', 'profile_users.ref_agama_id', 'ref_agamas.id')
                            ->join('ref_provinsis', 'profile_users.ref_provinsi_id', 'ref_provinsis.id')
                            ->join('ref_kabupatens', 'profile_users.ref_kabupaten_id', 'ref_kabupatens.id')
                            ->join('ref_kecamatans', 'profile_users.ref_kecamatan_id', 'ref_kecamatans.id')
                            ->join('ref_kelurahans', 'profile_users.ref_kelurahan_id', 'ref_kelurahans.id');
                        })
                        ->when(!$detail, function($qu) use($detail){
                            $qu->select('users.*');
                        })
                        ->filterUser($filter)
                        ->role($role) 
                        ->where('users.sekolah_id', \Auth::user()->sekolah_id);

        if ($paginate) {
            $users = $users->paginate(25)->withQueryString();
        } else {
            $users = $users->get();
        }
                
        return $users;
    }

    public static function findUser($role, $id){
        $user = User::select('users.id as user_id', 'users.email', 'users.profil', 'users.nip', 'profile_users.*','profile_users.jk', 'profile_users.tempat_lahir', 'profile_users.tanggal_lahir', 'profile_users.jalan', 'profile_users.name', 'ref_provinsis.nama as provinsi', 'ref_provinsis.id as ref_provinsi_id', 'ref_kabupatens.nama as kabupaten', 'ref_kabupatens.id as ref_kabupaten_id', 'ref_kecamatans.nama as kecamatan', 'ref_kecamatans.id as ref_kecamatan_id', 'ref_kelurahans.nama as kelurahan', 'ref_kelurahans.id as ref_kelurahan_id', 'ref_agamas.nama as agama', 'ref_agamas.id as ref_agama_id')
                        ->join('profile_users', 'profile_users.user_id', 'users.id')
                        ->join('ref_agamas', 'profile_users.ref_agama_id', 'ref_agamas.id')
                        ->join('ref_provinsis', 'profile_users.ref_provinsi_id', 'ref_provinsis.id')
                        ->join('ref_kabupatens', 'profile_users.ref_kabupaten_id', 'ref_kabupatens.id')
                        ->join('ref_kecamatans', 'profile_users.ref_kecamatan_id', 'ref_kecamatans.id')
                        ->join('ref_kelurahans', 'profile_users.ref_kelurahan_id', 'ref_kelurahans.id')
                        ->where('users.id', $id)
                        ->role($role) 
                        ->where('users.sekolah_id', \Auth::user()->sekolah_id)
                        ->first();

        return $user;
    }
}
