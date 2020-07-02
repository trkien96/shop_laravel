<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = [''];

    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;

    const HOT_ON = 1;
    const HOT_OFF = 0;

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

    protected $hot =[
        1 => [
            'name' => 'Nổi bật',
            'class' => 'label-success'
        ],
        0 => [
            'name' => 'Không',
            'class' => 'label-danger'
        ]
    ];

    public function getStatus()
    {
        return array_get($this->status, $this->p_active, '[N\A]');
    }

    public function getHot()
    {
        return array_get($this->hot, $this->p_hot, '[N\A]');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'p_category_id');
    }
}
