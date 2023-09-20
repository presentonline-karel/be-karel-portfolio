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
            "uri" => $project->uri(),
            "cover" => $project->carouselImages()->first()?->toFile()->toArray(),
            "isprojectnew" => $project->isProjectNew()->toBoolean()->value(),
            "longtitle" => $project->longTitle()->value(),
            "descriptioncard" => $project->descriptionCard()->value(),
            "tags" => $project->tags()->value(),
            "category" => $project->category()->value(),
        ])
];

echo \Kirby\Data\Json::encode($data);
