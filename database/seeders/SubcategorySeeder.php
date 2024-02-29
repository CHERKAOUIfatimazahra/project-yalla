<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Subcategory;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategoryNames = [
            'Finance', 'Marketing', 'Management',
            'Community', 'Relationships', 'Networking',
            'Art', 'Music', 'Literature',
            'Science', 'Math', 'History',
            'Football', 'Basketball', 'Tennis',
            'Volunteering', 'Donations', 'Fundraising',
            'Movies', 'Music', 'Games',
            'Video Games', 'Board Games', 'Role-Playing',
            'Shounen', 'Shoujo', 'Seinen'
        ];
        foreach ($subcategoryNames as $subcategoryName) {
            Subcategory::create(['name' => $subcategoryName]);
        }
}
}
