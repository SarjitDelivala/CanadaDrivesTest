<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Player\CreatePlayerRequest;
use App\Http\Requests\Player\UpdatePlayerRequest;
use App\Http\Resources\PlayerResource;
use App\Models\Player;
use App\Service\PlayerService;
use Illuminate\Http\Request;

class PlayerController extends Controller
{

    private $service;

    public function __construct(PlayerService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the players based on points scored.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return PlayerResource::collection($this->service->list());
    }

    /**
     * Store a newly created player.
     *
     * @param \App\Http\Requests\Player\CreatePlayerRequest $request
     *
     * @return \App\Http\Resources\PlayerResource
     */
    public function store(CreatePlayerRequest $request)
    {
        return new PlayerResource($this->service->create($request->validated()));
    }

    /**
     * Display the specified player.
     *
     * @param  \App\Models\Player  $player
     *
     * @return \App\Http\Resources\PlayerResource
     */
    public function show(Player $player)
    {
        return new PlayerResource($player);
    }

    /**
     * Update the specified player in storage.
     *
     * @param \App\Http\Requests\Player\UpdatePlayerRequest $request
     * @param \App\Models\Player $player
     *
     * @return \App\Http\Resources\PlayerResource
     */
    public function update(UpdatePlayerRequest $request, Player $player)
    {
        return new PlayerResource($this->service->update($request->validated(), $player));
    }

    /**
     * Increment / Decrement points of a player and get fresh leaderboard
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Player $player
     * @param string $action
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function updatePoints(Request $request, Player $player, string $action)
    {
        $this->service->updatePoints($player, $action);

        return PlayerResource::collection($this->service->list());
    }

    /**
     * Remove the specified player from storage.
     *
     * @param  \App\Models\Player  $player
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Player $player)
    {
        $this->service->delete($player);

        return response()->json(['success' => true], 200);
    }
}
