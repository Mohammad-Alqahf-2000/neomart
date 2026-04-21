<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasSlug
{
    protected static function bootHasSlug(): void
    {
        static::creating(function ($model) {
            $model->generateSlug();
        });
        static::updating(function ($model) {
            $model->generateSlug();
        });
    }
    public function generateSlug(): void
    {
        $slugSource = $this->getSlugSource();
        if (empty($this->slug) || $this->isDirty($slugSource)) {
            $this->slug = $this->createUniqueSlug($slugSource);
        }
    }
    protected function getSlugSource(): string
    {
        return 'en_name';
    }
    protected function createUniqueSlug(string $sourceField): string
    {
        $slug = Str::slug($this->{$sourceField});
        $originalSlug = $slug;
        $counter = 1;
        while ($this->slugExists($slug)) {
            $slug = $originalSlug . '-' . $counter++;
        }
        return $slug;
    }
    protected function slugExists(string $slug): bool
    {
        $query = static::where('slug', $slug);
        if ($this->exists) {
            $query->where('id', "!=", $this->id);
        }
        return $query->exists();
    }
}
