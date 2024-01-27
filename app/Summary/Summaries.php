<?php
namespace App\Summary;

class Summaries{
    public static function get(): array
    {
        $sections = Sections::get();
        return [
            [
                "poster"=> "storage/summaries/posters/harry-potter-season-1-movie-summary.webp",
                "summary"=> "storage/summaries/summaries/harry-potter-season-1-movie-summary.md",
                "sections"=> [
                    array_keys($sections)[0],
                    array_keys($sections)[2],
                    array_keys($sections)[1],
                ],
                "title"=> "ملخص فيلم هاري بوتر الموسم الأول",
                "description"=> "ملخص فيلم هاري بوتر الموسم الأول",
            ],
        ];

    }
}
