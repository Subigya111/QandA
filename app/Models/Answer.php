<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
#[Fillable(['question_id','user_id','answer','imagePath'])]
class Answer extends Model
{
        const UPDATED_AT = null;

    public function question():BelongsTo{
        return $this->belongsTo(Question::class);
    }
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
}
