<?php

namespace TresPontosTech\Consultant\Core\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Tags\HasTags;
use TresPontosTech\Consultant\Core\Enums\AvailableTagsEnum;
use TresPontosTech\Consultant\Core\Enums\ConsultantIntegrationProvider;

class Consultant extends Model implements HasMedia
{
    use HasFactory;
    use HasTags;
    use InteractsWithMedia;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'short_description',
        'slug',
        'biography',
        'readme',
        'socials_urls',
        'provider',
        'provider_id',
        'enabled',
    ];

    protected $casts = [
        'socials_urls' => 'array',
        'provider' => ConsultantIntegrationProvider::class,
    ];

    public function getConnectionName(): string
    {
        return config()->string('filament-consultants-module.consultants.connection');
    }

    public function languages(): MorphToMany
    {
        return $this->tags()
            ->where('type', AvailableTagsEnum::Language->value);
    }

    public function degrees(): MorphToMany
    {
        return $this->tags()
            ->where('type', AvailableTagsEnum::Education->value);
    }

    public function expertises(): MorphToMany
    {
        return $this->tags()
            ->where('type', AvailableTagsEnum::Expertise->value);
    }

    public function specializations(): MorphToMany
    {
        return $this->tags()
            ->where('type', AvailableTagsEnum::Specialization->value);
    }
}
