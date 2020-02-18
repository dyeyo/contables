<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ConceptosCierres extends Model
{
    protected $fillable=['nombreConcepto','puc_id','cierres_id'];

    public function puc() :BelongsTo
    {
        return $this->belongsTo(Puc::class);
    }

    public function cierre() :BelongsTo
    {
        return $this->belongsTo(Cierres::class);
    }
}
