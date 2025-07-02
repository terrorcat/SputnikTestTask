<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *  Модель товаров. Цены указываются в рублях
 */
class Goods extends Model
{
    use HasFactory;     // Разумно заранее предусмотреть фабрику, потому что она точно понадобится для тестов
    use SoftDeletes;    // Эта модель гарантированно породит связи с другими. Безопасно заранее предусмотреть мягкое удаление

    /**
     * Массив полей, массовое присвоение которых разрешено
     * @var string
     */
    protected $fillable = ['id', 'title', 'price'];
}
