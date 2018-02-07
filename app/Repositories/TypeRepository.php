<?php

namespace App\Repositories;

use App\Models\Type;
use Prettus\Repository\Eloquent\BaseRepository;

class TypeRepository extends BaseRepository
{
	public function model() :string
	{
		return Type::class;
	}
}