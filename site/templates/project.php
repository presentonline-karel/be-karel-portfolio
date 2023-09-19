<?php

/** @var \Kirby\Cms\App $kirby */
/** @var \Kirby\Cms\Site $site */

$data = [
    "period" => $page->period()->value(),
    "shortTitle" => $page->shortTitle()->value(),
    "description" => $page->description()->value(),
    "urls" => $page->urls()->toObject()->toArray(),
    "technologies" => $page->technologies()->toArray(),
    "carouselImages" => $page->carouselImages()->toFiles()->toArray(),
    "contentLabel" => $page->contentLabel()->value(),
    "contentTitle" => $page->contentTitle()->value(),
    "contentText" => $page->contentText()->toBlocks()->toArray(),
    "contentImage" => $page->contentImage()->toFile()->toArray(),
    "relatedProjects" => $page->relatedProjects()->toPages()->map(fn ($project) => [
        "id" => $project->id(),
        "title" => $project->title()->value(),
        "slug" => $project->slug(),
        "cover" => $project->carouselImages()->first()?->toFile()->toArray(),
        "isprojectnew" => $project->isProjectNew()->toBoolean()->value(),
        "longtitle" => $project->longTitle()->value(),
        "descriptioncard" => $page->descriptionCard()->value(),
        "tags" => $page->tags()->value(),
    ]),
];

echo \Kirby\Data\Json::encode($data);
