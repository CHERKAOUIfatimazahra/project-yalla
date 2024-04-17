<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
     protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function all()
    {
        return $this->category->latest()->paginate(5);
    }

    public function create(array $data)
    {
        return $this->category->create($data);
    }

    public function update(Category $category, array $data)
    {
        return $category->update($data);
    }

    public function delete(Category $category)
    {
        return $category->delete();
    }

    public function find($id)
    {
        return $this->category->findOrFail($id);
    }
}
