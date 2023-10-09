<?php

namespace App\Http\Livewire;

use App\Traits\CategoriesNav;
use Livewire\Component;
use MarcReichel\IGDBLaravel\Models\Game;
use MarcReichel\IGDBLaravel\Models\GameMode;
use MarcReichel\IGDBLaravel\Models\Genre;
use MarcReichel\IGDBLaravel\Models\Theme;

class CategoryComponent extends Component
{

    use CategoriesNav;

    public $category;
    public $category_slug;
    protected $games;
    public $search = '';



    // navigation
    public $genre;
    public $theme;
    public $mode;


    
    public function mount()
    {
        
    }
    
    public function render()
    {
        $this->loadCategories();

        switch ($this->category) {
            case 'genre':
                $genre = Genre::where('slug', $this->category_slug)->firstOrFail();
                $this->games = Game::where('name', 'like', '%' . $this->search . '%')->with(['genres' => ['*'], 'cover' => ['*']])->whereIn('genres', [$genre->id])->paginate(24);
                break;
            case 'theme':
                $theme = Theme::where('slug', $this->category_slug)->firstOrFail();
                $this->games = Game::where('name', 'like', '%' . $this->search . '%')->with(['themes' => ['*'], 'cover' => ['*']])->whereIn('themes', [$theme->id])->paginate(24);
                break;
            case 'game-mode':
                $mode = GameMode::where('slug', $this->category_slug)->firstOrFail();
                $this->games = Game::where('name', 'like', '%' . $this->search . '%')->with(['game_modes' => ['*'], 'cover' => ['*']])->whereIn('game_modes', [$mode->id])->paginate(24);
                break;
        }
        
        return view('livewire.category', ['games' => $this->games]);
    }

    public function changeCategorySlug($slug, $category){

        $this->category_slug = $slug;
        $this->category = $category;
        $this->emit('urlChanged', '/'. $this->category .'/' . $this->category_slug);
        
    }

}
