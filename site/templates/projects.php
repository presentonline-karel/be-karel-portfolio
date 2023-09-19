<?php

/** @var \Kirby\Cms\App $kirby */
/** @var \Kirby\Cms\Site $site */

$data = [
    "projectsTitle" => $page->projectsTitle()->value(),
    "projectsParagraph" => $page->projectsParagraph()->value(),
    "labelTags" => $page->labelTags()->value(),
    "tags" => $page->tags()->value(),
    "projects" => $page
        ->children()
        ->listed()
        ->sortBy('date', 'desc')
        ->map(fn ($project) => [
            "id" => $project->id(),
            "title" => $project->title()->value(),
            "slug" => $project->slug(),
            "cover" => $project->carouselImages()->first()?->toFile()->toArray(),
            "isprojectnew" => $project->isProjectNew()->toBoolean()->value(),
            "longtitle" => $project->longTitle()->value(),
            "descriptioncard" => $page->descriptionCard()->value(),
            "tags" => $page->tags()->value(),
        ])
];

echo \Kirby\Data\Json::encode($data);
