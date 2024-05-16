<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Job extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'salary', 'description', 'schedule', 'featured', 'url', 'tags', 'location'];

    public function tag(string $tag_name): void
    {
        $tag = Tag::firstOrCreate(['name' => $tag_name]);
        $this->tags()->attach($tag);
    }
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }
}
