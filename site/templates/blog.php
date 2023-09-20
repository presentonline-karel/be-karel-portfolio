<?php

/** @var \Kirby\Cms\App $kirby */
/** @var \Kirby\Cms\Site $site */

$data = [
    "blogsTitle" => $page->blogsTitle()->value(),
    "blogsParagraph" => $page->blogsParagraph()->value(),
    "labelTags" => $page->labelTags()->value(),
    "tags" => $page->tags()->value(),
    "blogs" => $page
        ->children()
        ->listed()
        ->sortBy('date', 'desc')
        ->map(fn ($blog) => [
            "id" => $blog->id(),
            "blogTitle" => $blog->blogTitle()->value(),
            "slug" => $blog->slug(),
            "uri" => $blog->uri(),
            "isblognew" => $blog->isBlogNew()->toBoolean()->value(),
            "tag" => $blog->tag()->value(),
            "publishDate" => $blog->publishDate()->value(),
            "minutesRead" => $blog->minutesRead()->value(),
            "coverImage" => $blog->coverImage()->toFile()?->toArray(),
        ]),
    "customBlocks" => $page->customBlocks()->toBlocks()->toArray(),
];

echo \Kirby\Data\Json::encode($data);