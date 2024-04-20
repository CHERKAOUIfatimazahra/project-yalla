<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Business',
                'description' => 'Explore events tailored for professionals and entrepreneurs. Attend workshops, seminars, and networking sessions designed to help you grow your business and expand your network.',
                'icon' => 'fa-business',
                'image' => null,
            ],
            [
                'name' => 'Social',
                'description' => 'Discover events where you can connect with like-minded individuals and build meaningful relationships. From meetups to social mixers, these events offer opportunities to socialize and have fun.',
                'icon' => 'fa-social',
                'image' => null,
            ],
            [
                'name' => 'Cultural',
                'description' => 'Immerse yourself in diverse cultures and traditions through cultural events and celebrations. From festivals to art exhibitions, these events showcase the richness and diversity of our world.',
                'icon' => 'fa-cultural',
                'image' => null,
            ],
            [
                'name' => 'Educational',
                'description' => 'Enhance your knowledge and skills through educational events and programs. Attend lectures, webinars, and training sessions to learn from experts and stay updated on the latest trends and developments.',
                'icon' => 'fa-education',
                'image' => null,
            ],
            [
                'name' => 'Sporting',
                'description' => 'Stay active and healthy with sports and fitness events tailored to your interests and fitness level. Participate in sports leagues, group workouts, and outdoor adventures to stay fit and have fun.',
                'icon' => 'fa-sport',
                'image' => null,
            ],
            [
                'name' => 'Charity',
                'description' => 'Make a difference in your community by supporting charitable events and initiatives. Volunteer, donate, or participate in fundraising events to support causes you care about and give back to those in need.',
                'icon' => 'fa-charity',
                'image' => null,
            ],
            [
                'name' => 'Entertainment',
                'description' => 'Unwind and enjoy leisurely activities with entertainment events for all ages. From concerts to movie nights, these events offer entertainment and relaxation for everyone.',
                'icon' => 'fa-entertainment',
                'image' => null,
            ],
            [
                'name' => 'Gaming',
                'description' => 'Dive into the exciting world of gaming and esports with events that cater to gamers of all skill levels. Join tournaments, watch live streams, and connect with fellow gaming enthusiasts.',
                'icon' => 'fa-gaming',
                'image' => null,
            ],
            [
                'name' => 'Anime',
                'description' => 'Immerse yourself in the vibrant world of anime and manga with events that celebrate Japanese pop culture. Attend conventions, cosplay events, and screenings to connect with fellow fans and explore your interests.',
                'icon' => 'fa-anime',
                'image' => null,
            ],
        ];

        // Create categories
        foreach ($categories as $categoryData) {
            Category::create($categoryData);
        }
    }
}
