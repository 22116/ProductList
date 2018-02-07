<?php

namespace App\Http\Controllers\Resources;

use App\Http\Requests\ProducerRequest;
use App\Models\Producer;
use App\Repositories\ProducerRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Redirect;
use Exception;

class ProducerController extends BaseResourceController
{
	private $producerRepository;

	public function __construct(ProducerRepository $producerRepository)
	{
		parent::__construct();

		$this->producerRepository = $producerRepository;
	}

	public function index() :View
	{
		return view('main.producer.producers', [ 'producers' => $this->producerRepository->all() ]);
	}

	public function create() :View
	{
		return view('main.producer.producer_create');
	}

	public function store(ProducerRequest $request) :RedirectResponse
	{
		try {
			$producer = $this->producerRepository->create([
				'name' => $request->post('name'),
				'header' => $request->post('header'),
			]);
			return Redirect::route('producer.show', [ $producer ]);
		} catch (\Exception $exception) {
			return Redirect::route('producer.index');
		}
	}

	public function show(Producer $producer) :View
	{
		return view('main.producer.producer', [ 'producer' => $producer ]);
	}

	public function edit(Producer $producer) :View
	{
		return view('main.producer.producer_edit', ['producer' => $producer]);
	}

	public function update(ProducerRequest $request, Producer $producer) :RedirectResponse
	{
		try {
			$this->producerRepository->update([
				'name' => $request->post('name'),
				'header' => $request->post('header')
			], $producer->id);
			return Redirect::route('producer.show', [ $producer ]);
		} catch (Exception $exception) {
			return Redirect::route('producer.edit', [ $producer ]);
		}
	}

	public function destroy(Producer $producer) :RedirectResponse
	{
		$this->producerRepository->delete($producer->id);

		return Redirect::route('producer.index');
	}
}
