<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeBlock extends Model
{
    //
    protected $table = 'time_block';
    protected $fillable = [
        'user', 'tag', 'hour', 'moment', 'belong',
    ];

    public function getBlock($user, $belong)
    {
        return self::where([
            ['user', '=', $user],
            ['belong','=',$belong]
        ])->get();
    }

    public function saveBlock($blocks)
    {
        foreach ($blocks as $block) {
            $tag = $block['tag'];
            unset($block['tag']);
            $this::updateOrCreate($block, ['tag' => $tag]);
        }
        return true;
    }
}
