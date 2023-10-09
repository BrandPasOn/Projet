<?php

namespace App\Traits;

use MarcReichel\IGDBLaravel\Models\GameMode;
use MarcReichel\IGDBLaravel\Models\Genre;
use MarcReichel\IGDBLaravel\Models\Theme;

trait CategoriesNav
{
    public $genre;
    public $theme;
    public $mode;

    public function loadCategories()
    {
        $this->genre = Genre::orderBy('name')->all();
        $this->theme = Theme::orderBy('name')->all();
        $this->mode = GameMode::orderBy('name')->all();
    }
}
