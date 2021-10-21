<?php

namespace App\Service;

use App\Models\Player;
use Illuminate\Support\Facades\DB;

class PlayerService
{
    public function list()
    {
        return DB::transaction(function() {
            return Player::orderBy('points', 'desc')->paginate();
        });
    }

    public function update(array $data, Player $player)
    {
        return DB::transaction(function() use ($data, $player) {
            $player->update($data);

            return $player->refresh();
        });
    }

    public function updatePoints(Player $player, string $action)
    {
        return DB::transaction(function() use ($player, $action) {

            switch ($action) {
                case 'increment':
                    $player->increment('points');
                    break;
                case 'decrement':
                    if ($player->points > 0) {
                        $player->decrement('points');
                    }
                    break;
            }

            return $player->refresh();
        });
    }

    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            return Player::create($data);
        });
    }

    public function delete(Player $player)
    {
        $player->delete();
    }
}
