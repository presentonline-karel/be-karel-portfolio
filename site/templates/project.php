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
];

echo \Kirby\Data\Json::encode($data);