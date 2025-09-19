<?php

namespace App\DataTransferObjects;

readonly class LanguageSite
{
    public function __construct(
        public string $handle,
        public string $name,
        public string $locale,
        public string $lang,
        public string $url,
        public bool $hasTranslation = false,
    ) {}

    public function toArray(): array
    {
        return [
            'handle' => $this->handle,
            'name' => $this->name,
            'locale' => $this->locale,
            'lang' => $this->lang,
            'url' => $this->url,
            'hasTranslation' => $this->hasTranslation,
        ];
    }
}
