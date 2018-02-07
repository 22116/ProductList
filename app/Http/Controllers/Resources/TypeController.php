<?php

namespace App\Http\Controllers\Resources;

use App\Http\Requests\TypeRequest;
use App\Repositories\TypeRepository;
use App\Models\Type;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Redirect;
use Exception;

class TypeController extends BaseResourceController
{
	private $typeRepository;

	public function __construct(TypeRepository $typeRepository)
	{
		parent::__construct();

		$this->typeRepository = $typeRepository;
	}

	public function index() :View
	{
		return view('main.type.types', [ 'types' => $this->typeRepository->all() ]);
	}

	public function create() :View
	{
		return view('main.type.type_create');
	}

	public function store(TypeRequest $request) :RedirectResponse
	{
		try {
			$type = $this->typeRepository->create([
				'name' => $request->post('name')
			]);
			return Redirect::route('type.show', [ $type ]);
		} catch (Exception $exception) {
			return Redirect::route('type.index');
		}
	}

	public function show(Type $type) :View
	{
		return view('main.type.type', [ 'type' => $type ]);
	}

	public function edit(Type $type) :View
	{
		return view('main.type.type_edit', ['type' => $type]);
	}

	public function update(TypeRequest $request, Type $type) :RedirectResponse
	{
		try {
			$this->typeRepository->update([
				'name' => $request->post('name')
			], $type->id);
			return Redirect::route('type.show', [ $type ]);
		} catch (Exception $exception) {
			return Redirect::route('type.edit', [ $type ]);
		}
	}

	public function destroy(Type $type) :RedirectResponse
	{
		$this->typeRepository->delete($type->id);

		return Redirect::route('type.index');
	}
}
