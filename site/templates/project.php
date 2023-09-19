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
    "relatedProjects" => $page->relatedProjects()->toPages()->toArray(),
];

echo \Kirby\Data\Json::encode($data);