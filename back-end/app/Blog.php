<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function complete()
    {
        $this->complete = true;
        $this->save();
    }
}
