<?php

namespace App\Http\Livewire;

use App\Models\UserGame;
use App\Traits\CategoriesNav;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use MarcReichel\IGDBLaravel\Models\Game;
use MarcReichel\IGDBLaravel\Models\GameMode;
use MarcReichel\IGDBLaravel\Models\Genre;
use MarcReichel\IGDBLaravel\Models\Theme;

class HomeComponent extends Component
{
    use WithPagination;
    use CategoriesNav;

    public $mostPopularGames;

    public $search;
    public $game_searched;

    public function render()
    {
        $this->loadCategories();

        $mostPlayedGames = UserGame::select('game_id', DB::raw('COUNT(game_id) as most_played'))
            ->groupBy('game_id')
            ->orderByDesc('most_played')
            ->limit(4)
            ->get();

        $mostPlayedGames_id = []; // Initialisation du tableau

        // Parcours de la collection et ajout des game_id au tableau
        foreach ($mostPlayedGames as $game) {
            $mostPlayedGames_id[] = $game->game_id;
        }

        $this->mostPopularGames = Game::with(['cover' => ['*']])
            ->whereIn('id', $mostPlayedGames_id)
            ->get();

        if ($this->search != "") {
            $this->game_searched = Game::whereLike('name', $this->search, false)->get();
        } else {
            $this->game_searched = null;
        }

        return view('livewire.home');
    }


}
