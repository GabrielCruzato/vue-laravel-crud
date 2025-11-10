<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ItemController extends Controller
{
    private const CACHE_KEY = 'items_list';
    
    private function getItems()
    {
        return Cache::get(self::CACHE_KEY, []);
    }
    
    private function saveItems($items)
    {
        Cache::put(self::CACHE_KEY, $items, now()->addHours(24));
    }
    
    public function index()
    {
        return response()->json(array_values($this->getItems()));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);
        
        $items = $this->getItems();
        $item = [
            'id' => uniqid(),
            'name' => $request->input('name'),
            'created_at' => now()->toISOString(),
        ];
        
        $items[] = $item;
        $this->saveItems($items);
        
        return response()->json($item, 201);
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);
        
        $items = $this->getItems();
        $updated = false;
        
        foreach ($items as &$item) {
            if ($item['id'] === $id) {
                $item['name'] = $request->input('name');
                $item['updated_at'] = now()->toISOString();
                $updated = true;
                break;
            }
        }
        
        if (!$updated) {
            return response()->json(['error' => 'Item não encontrado'], 404);
        }
        
        $this->saveItems($items);
        return response()->json($item);
    }
    
    public function destroy($id)
    {
        $items = $this->getItems();
        $initialCount = count($items);
        
        $items = array_filter($items, fn($item) => $item['id'] !== $id);
        
        if (count($items) === $initialCount) {
            return response()->json(['error' => 'Item não encontrado'], 404);
        }
        
        $this->saveItems($items);
        return response()->json(['message' => 'Item removido com sucesso']);
    }
}