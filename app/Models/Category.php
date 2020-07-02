<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = [''];

    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;

    protected $status =[
        1 => [
            'name' => 'Công khai',
            'class' => 'label-success'
        ],
        0 => [
            'name' => 'Riêng tư',
            'class' => 'label-danger'
        ]
    ];

    public function getStatus()
    {
        return array_get($this->status, $this->c_active, '[N\A]');
    }
}
