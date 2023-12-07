<?php

namespace App\Models;

use App\Models\DecisionMatrix;
use App\Models\Kriteria;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    protected $table = "alternatif";
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nama_alternatif',
    ];

    public function decision_matrix()
    {
        return $this->hasMany(DecisionMatrix::class, 'id_alternatif', 'id');
    }


    public function isUsed()
    {
        // Pemeriksaan apakah id_alternatif telah digunakan di tabel decision_matrix
        return DecisionMatrix::where('id_alternatif', $this->id)->exists();
    }

}
