<?php
namespace App\Http\Traits;
use App\Models\Purchase;
use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;

trait InventoryTrait
{
    protected function restock(Purchase $purchase){
        foreach($purchase->details as $detail){
            $inventory = Inventory::find($detail->inventory_id);
            
        }
        // $wishlist = Wishlist::firstOrCreate(['user_id' => $user->id,'product_id' => $product->id]);
        return $user->wishlists->count();

    }
    protected function removeWishlist(Product $product){
        $user = Auth::user();
        return $user->wishlists->count();
    }
    
}

