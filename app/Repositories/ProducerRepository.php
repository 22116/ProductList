<?php

namespace App\Repositories;

use App\Models\Producer;
use Prettus\Repository\Eloquent\BaseRepository;

class ProducerRepository extends BaseRepository
{
	public function model() :string
	{
		return Producer::class;
	}
}