<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Win extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'is_win', 'risk', 'risk_reward_ratio', 'created_at', 'updated_at' ];
}