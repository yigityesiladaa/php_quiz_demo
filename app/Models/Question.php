<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question', 'answer1', 'answer2', 'answer3', 'answer4', 'answer4', 'image'];
    protected $appends = ['true_percent'];
    use HasFactory;

    public function getTruePercentAttribute()
    {
        $answer_count = $this->answers()->count();
        $true_answers = $this->answers()->where('answer', $this->correct_answer)->count();

        return round((100 / $answer_count) * $true_answers);
    }

    public function answers()
    {
        return $this->hasMany('App\Models\Answer');
    }

    public function my_answer()
    {
        return $this->hasOne('App\Models\Answer')->where('user_id', auth()->user()->id);
    }
}
