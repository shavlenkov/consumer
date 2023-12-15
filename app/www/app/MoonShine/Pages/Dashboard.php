<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use MoonShine\Pages\Page;

use MoonShine\Metrics\LineChartMetric; 
use App\Models\Post;
use App\Models\Category;
use MoonShine\Decorations\Grid;
use MoonShine\Metrics\DonutChartMetric;
use MoonShine\Metrics\ValueMetric; 
use MoonShine\Decorations\Divider;


class Dashboard extends Page
{
    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title()
        ];
    }

    public function title(): string
    {
        return $this->title ?: 'Dashboard';
    }
    

    public function components(): array
	{

        $arr = [];

        foreach(Category::all() as $category) {
            $arr[$category->title] = count($category->posts);
        }

		 return [

            Grid::make([
                LineChartMetric::make('Post') 
            ->line([
                'Post' => Post::query()
                    ->selectRaw('COUNT(id) as sum, DATE_FORMAT(created_at, "%d.%m.%Y") as date')
                    ->groupBy('date')
                    ->pluck('sum','date')
                    ->toArray(),
            ],[
                'red'
            ])->columnSpan(6),
                DonutChartMetric::make('Post')
                ->values($arr)
                ->columnSpan(6)
            ]),
            Divider::make(), 
            Grid::make([
                 ValueMetric::make('Новин')
            ->value(count(Post::whereNotNull('category_id')
             ->whereHas('category', function ($query) {
                 $query->where('title', 'Новини');
             })->get()))->columnSpan(6) ,
              ValueMetric::make('Анонси')
            ->value(count(Post::whereNotNull('category_id')
             ->whereHas('category', function ($query) {
                 $query->where('title', 'Анонси');
             })->get()))->columnSpan(6) 
            ]),

             
            
        ];

	}
}