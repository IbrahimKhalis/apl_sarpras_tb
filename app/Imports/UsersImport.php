<?php

namespace App\Imports;

use Auth, Hash, DB;
use App\Models\User;
use App\Models\TahunAjaran;
use App\Models\profile_user;
use Illuminate\Support\Collection;  
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToCollection, WithHeadingRow
{
    protected $role;
    protected $request;

    public function __construct($role, $request){
        $this->role = $role;
        $this->request = $request;
    }

    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
            '*.nama_lengkap' => 'required',
            '*.email' => 'required|unique:users',
            '*.jenis_kelamin' => 'required',
            '*.nip' => 'required|unique:users',
        ])->validate();
        
        foreach ($rows as $row) {
            $user = User::create([
                'email' => $row['email'],
                'sekolah_id' => Auth::user()->sekolah_id,
                'password' => Hash::make('*123456*'),
                'nip' => $row['nip'],
                'name' => $row['nama_lengkap'],
            ]);
            
            $user->assignRole($this->role);
        }
    }
}
