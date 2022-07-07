<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters) {
        if ($filters['demanda'] ?? false) {
            $query->where('demanda', 'like', '%' . request('demanda') . '%');
        }
        
        if ($filters['status'] ?? false) {
            $query->where('status', 'like', request('status'));
        }

        if ($filters['search'] ?? false) {
            $query->where('status', 'like', '%' . request('search') . '%')
            ->orWhere('demanda', 'like', '%' . request('search') . '%')
            ->orWhere('aluno_nome', 'like', '%' . request('search') . '%')
            ->orWhere('aluno_email', 'like', '%' . request('search') . '%');
        }
        
    }
}