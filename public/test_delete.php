<?php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

use App\Models\Product;
use Illuminate\Support\Facades\Storage;

echo "Products count: " . Product::count() . "\n";
$product = Product::first();
if ($product) {
    echo "Deleting product: {$product->name}\n";
    try {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
            echo "Deleted image\n";
        }
        $product->delete();
        echo "Deleted product successfully\n";
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
}
echo "Remaining products count: " . Product::count() . "\n";
