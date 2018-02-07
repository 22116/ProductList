<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Producer
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $header
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Producer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Producer whereHeader($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Producer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Producer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Producer whereUpdatedAt($value)
 */
class Producer extends Model
{
	protected $fillable = [ 'name', 'header' ];

	public function products() :HasMany
	{
		return $this->hasMany(Product::class);
	}
}
