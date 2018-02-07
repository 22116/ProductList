<?php

namespace App\Http\Controllers\Resources;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Repositories\ProducerRepository;
use App\Repositories\ProductRepository;
use App\Repositories\TypeRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Redirect;
use Exception;

class ProductController extends BaseResourceController
{
    private $productRepository;
    private $typeRepository;
    private $producerRepository;

    public function __construct(
        ProductRepository $productRepository,
        TypeRepository $typeRepository,
        ProducerRepository $producerRepository
    )
    {
        parent::__construct();

        $this->productRepository = $productRepository;
        $this->typeRepository = $typeRepository;
        $this->producerRepository = $producerRepository;
    }

    public function index(Request $request) :View
    {
        /** @var  $products Collection */
        $products = $this->productRepository->all();

        if ($request->has('filter') && $request->has('value')) {
            $filter = $request->get('filter');
            $value = $request->get('value');

            $products = $products->filter(function (Product $product) use ($filter, $value) {
                if (in_array($filter, ['type', 'producer']))
                    return $product->$filter->name == $value;
                else
                    return $product->$filter == $value;
            });
        }

        return view('main.product.products', ['products' => $products]);
    }

    public function create() :View
    {
        return view('main.product.product_create', [
            'producers' => $this->producerRepository->all(),
            'types' => $this->typeRepository->all()
        ]);
    }

    public function store(ProductRequest $request) :RedirectResponse
    {
        try {
            $product = $this->productRepository->create([
                'name' => $request->post('name'),
                'description' => $request->post('description'),
                'type_id' => $request->post('type_id'),
                'producer_id' => $request->post('producer_id')
            ]);
            return Redirect::route('product.show', [ $product ]);
        } catch (\Exception $exception) {
            return Redirect::route('product.index');
        }
    }

    public function show(Product $product) :View
    {
        return view('main.product.product', [ 'product' => $product ]);
    }

    public function edit(Product $product) :View
    {
        return view('main.product.product_edit', [
            'product' => $product,
            'producers' => $this->producerRepository->all(),
            'types' => $this->typeRepository->all()
        ]);
    }

    public function update(ProductRequest $request, Product $product) :RedirectResponse
    {
        try {
            $this->productRepository->update([
                'name' => $request->post('name'),
                'description' => $request->post('description'),
                'type_id' => $request->post('type_id'),
                'producer_id' => $request->post('producer_id')
            ], $product->id);
            return Redirect::route('product.show', [ $product ]);
        } catch (Exception $exception) {
            return Redirect::route('product.edit', [ $product ]);
        }
    }

    public function destroy(Product $product) :RedirectResponse
    {
        $this->productRepository->delete($product->id);

        return Redirect::route('product.index');
    }
}
