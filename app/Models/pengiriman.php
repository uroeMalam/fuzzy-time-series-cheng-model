<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\SoftDeletes;

class pengiriman extends Model
{
    use HasFactory;
    use Timestamp;
    use SoftDeletes;

    protected $table = 'tb_pengiriman';
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'tahun', 'bulan', 'total', 'sukses_antar', 'gagal_antar', 'retus',
    ];
}
