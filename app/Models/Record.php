<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model {
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'music_id', 'store', 'time', 'level',
        'jc_cnt', 'cr_cnt', 'at_cnt', 'ms_cnt', 'max_cmb', 'track_no',
    ];

    protected $dates = ['time'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = md5($model->user_id.$model->time->format('YmdHis'));
        });
    }

    public static function create(array $data) {
        $data['user_id']=auth()->id();
        $model = static::query()->create($data);
        return $model;
    }

    public function music() {
        return $this->belongsTo('App\Models\Music');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function isFullCombo() {
        return $this->ms_cnt==0;
    }

    public function isAllJustice() {
        return $this->at_cnt==0 && $this->ms_cnt==0;
    }

    public function getScore() {
        $note_cnt = $this->jc_cnt + $this->cr_cnt + $this->at_cnt + $this->ms_cnt;
        return (int)(1000000/$note_cnt*(
            $this->jc_cnt * 1.01 +
            $this->cr_cnt * 1.00 +
            $this->at_cnt * 0.50));
    }

    public function getRank() {
        $score=$this->getScore();
        if($score>=1007500)return "SSS";
        if($score>=1000000)return "SS";
        if($score>= 975000)return "S";
        if($score>= 950000)return "AAA";
        if($score>= 925000)return "AA";
        if($score>= 900000)return "A";
        if($score>= 800000)return "BBB";
        if($score>= 700000)return "BB";
        if($score>= 600000)return "B";
        if($score>= 500000)return "C";
        return "D";
    }

    public function getLevelStr() {
        return ['BAS', 'ADV', 'EXP', 'MAS'][$this->level];
    }

    public function getLevelStyleName() {
        return ['basic', 'advanced', 'expert', 'master'][$this->level];
    }
}
