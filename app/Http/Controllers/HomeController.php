<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request, $filter = null)
    {
        $pokemons = DB::table('pokemons');

        $search = '';

        if (isset($filter)) {
            switch ($filter) {
                case 'search':
                    $search = $request->search_query;
                    $pokemons = $pokemons->where('name', 'like', "%$search%")
                        ->orWhere('id', 'like', "%$search%");
                    break;
                case 'randomize':
                    $pokemons = $pokemons->inRandomOrder();
                    break;
                case 'o-id-asc':
                    $pokemons = $pokemons->orderBy('id', 'asc');
                    break;
                case 'o-id-desc':
                    $pokemons = $pokemons->orderBy('id', 'desc');
                    break;
                case 'o-a-z':
                    $pokemons = $pokemons->orderBy('name', 'asc');
                    break;
                case 'o-z-a':
                    $pokemons = $pokemons->orderBy('name', 'desc');
                    break;

                default:
                    # code...
                    break;
            }
        }

        $pokemons = $pokemons->get();

        return view('welcome', ['pokemons' => $pokemons, 'search' => $search]);
    }

    public function show($id)
    {

        $pokemon = Pokemon::findOrFail($id);
        $count = Pokemon::all()->count();

        if ($id == 1) {
            $prev = Pokemon::where('id', $count)->first();
            $next = Pokemon::where('id', '>', $pokemon->id)->oldest('id')->first();
        } elseif ($id == $count) {
            $prev = Pokemon::where('id', '<', $pokemon->id)->latest('id')->first();
            $next = Pokemon::where('id', 1)->first();
        } else {
            $prev = Pokemon::where('id', '<', $pokemon->id)->latest('id')->first();
            $next = Pokemon::where('id', '>', $pokemon->id)->oldest('id')->first();
        }

        $evo = json_decode($pokemon->evolutions);

        $evolutions = Pokemon::whereIn('id', $evo)->get();

        return view('detail', [
            'pokemon' => $pokemon,
            'evolutions' => $evolutions,
            'prev' => $prev,
            'next' => $next
        ]);
    }
}
