<?php
use App\Models\Content;

if (!function_exists('getContentBySlug')) {
    function getContentBySlug($slug)
    {
        // Retrieve the 'content' column value based on the provided 'slug'
        $content = Content::where('slug', $slug)->value('content');
        // You can now use the $title variable for further processing or return it in your response
        return $content;
    }
}
