<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repositories\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->all();

        return view('dashbord.categories.index', compact('categories'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('dashbord.categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();

        
        $iconFileName = null;
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageFileName = time() . '.' . $file->getClientOriginalExtension();
            $path = 'uploads/events/';
            $file->move($path, $imageFileName);
        }
            
            $data["image"] = $imageFileName;
        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $iconFileName = time() . '.' . $file->getClientOriginalExtension();
            $path = 'uploads/events/';
            $file->move($path, $iconFileName);
        }
        $data["icon"] = $iconFileName;

        $this->categoryRepository->create($data);

        return redirect()->route('categories.index')
                        ->with('success', 'Category created successfully.');
    }
    public function edit($id)
    {
        $category = $this->categoryRepository->find($id);

        return view('dashbord.categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = $this->categoryRepository->find($id);
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageFileName = time() . '.' . $file->getClientOriginalExtension();
            $path = 'uploads/events/';
            $file->move($path, $imageFileName);
            $data["image"] = $imageFileName;
        }
            
        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $iconFileName = time() . '.' . $file->getClientOriginalExtension();
            $path = 'uploads/events/';
            $file->move($path, $iconFileName);
            $data["icon"] = $iconFileName;
        }
        $this->categoryRepository->update($category, $data);

        return redirect()->route('categories.index')
                        ->with('success', 'Category updated successfully');
    }

    public function destroy($id)
    {
        $category = $this->categoryRepository->find($id);

        $this->categoryRepository->delete($category);

        return redirect()->route('categories.index')
                        ->with('success', 'Category deleted successfully');
    }
}
