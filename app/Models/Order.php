<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Order extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = ['order_code', 'user_id', 'subtotal', 'tax', 'grandtotal', 'status', 'table_number', 'payment_method', 'note', 'deleted_at', 'created_at', 'updated_at'];
    protected $table = 'orders';
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
