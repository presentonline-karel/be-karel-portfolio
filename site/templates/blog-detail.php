<?php

/** @var \Kirby\Cms\App $kirby */
/** @var \Kirby\Cms\Site $site */

$data = [
    "blogTitle" => $page->blogTitle()->value(),
    "isBlogNew" => $page->isBlogNew()->toBoolean()->value(),
    "blogIntro" => $page->blogIntro()->value(),
    "tag" => $page->tag()->value(),
    "publishDate" => $page->publishDate()->value(),
    "minutesRead" => $page->minutesRead()->value(),
    "coverImage" => $page->coverImage()->toFile()?->toArray(),
    "blogDetailBlocks" => $page->blogDetailBlocks()->toBlocks()->toArray(),
    "relatedBlogs" => $page->relatedBlogs()->toPages()->map(fn ($blog) => [
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
