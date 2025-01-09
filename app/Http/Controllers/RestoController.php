<?php

namespace App\Http\Controllers;

use App\Models\CartMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestoController extends Controller
{
    function showContact() {
        return view('contact');
    }

    function submitContact(Request $request) {
        
    }

    function showHome() {
        return view('home');
    }

    public function addToCart(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric'
        ]);

        // Tambahkan data ke tabel cart_items
        CartMenu::create($validated);

        // Redirect kembali ke halaman menu dengan pesan sukses
        return redirect()->back()->with('success', 'Dish added to cart successfully!');
    }

    public function showMenu() {
        $menuItems = [
            [
                'name' => 'MARGHERITA',
                'price' => 119000,
                'description' => 'A classic Italian pizza with fresh tomato sauce, mozzarella, and basil.',
                'image' => '/images/margherita.jpg',
            ],
            [
                'name' => 'ANTONIA',
                'price' => 116000,
                'description' => 'A delightful dish with a perfect blend of fresh ingredients and Italian flavors.',
                'image' => '/images/antonia.jpg',
            ],
            [
                'name' => 'SALMON LASAGNA',
                'price' => 129000,
                'description' => 'Layers of salmon, spinach, and creamy cheese sauce. Delicious and satisfying.',
                'image' => '/images/salmon_lasagna.jpg',
            ],
            [
                'name' => 'PENNE ARRABIATA',
                'price' => 78000,
                'description' => 'Penne pasta in a spicy tomato sauce with garlic and chili. Bold and flavorful.',
                'image' => '/images/penne_arrabiata.jpg',
            ],
            [
                'name' => 'BEEF SOTTO\'OLIO',
                'price' => 177000,
                'description' => 'Savor the perfect combination of tender roast beef and flavorful melanzane sott\'olio. ',
                'image' => '/images/beef_sotto\'olio.jpg',
            ],
            [
                'name' => 'PASTA AL FRUTTI DI MARE',
                'price' => 149000,
                'description' => 'Fresh from the sea to your plate—our Pasta Al Frutti.',
                'image' => '/images/pasta_al_frutti_di_mare.jpg',
            ],
            [
                'name' => 'BRIOCHE',
                'price' => 96000,
                'description' => 'Homemade meets gourmet with our smoked salmon, brioche, and spinach perfection.',
                'image' => '/images/brioche.jpg',
            ],
            [
                'name' => 'BRIE CHEESE',
                'price' => 65000,
                'description' => 'Our baked brie cheese adorned and dip it with our garlic bruschetta.',
                'image' => '/images/brie_cheese.jpg',
            ],
            [
                'name' => 'BRESAOLA DI WAGYU FATTA IN CASA',
                'price' => 188000,
                'description' => 'A Zestiamo, crediamo che il cibo italiano sia un’esperienza da vivere.',
                'image' => '/images/bresaola_di_wagyu_fatta_in_casa.jpg',
            ],
            [
                'name' => 'CONTROFILETTO DI MANZO AL PEPE',
                'price' => 191000,
                'description' => 'Satisfy your cravings with our Beef Striploin Jack Creek MB 2+ with Green Pepper Sauce & Sautéed Butter Spinach',
                'image' => '/images/controfiletto_di_manzo_al_pepe.jpg',
            ],
            [
                'name' => 'SANGRIA',
                'price' => 48000,
                'description' => 'Red & White Sangria.',
                'image' => '/images/sangria.jpg',
            ],
            [
                'name' => 'SANGRIA BIANCA',
                'price' => 48000,
                'description' => 'This lightly sparkling ‘Sangria Bianca’ full of summer fruits is wonderfully refreshing, with a slightly spicy accent.',
                'image' => '/images/sangria_bianca.jpg',
            ],
            [
                'name' => 'TREVISO REMEDY',
                'price' => 48000,
                'description' => 'Any holiday calls for an appropriate cocktail to toast the occasion.',
                'image' => '/images/treviso_remedy.jpg',
            ],
            [
                'name' => 'SEA COCKTAILS',
                'price' => 55000,
                'description' => 'This lightly sparkling ‘Sangria Bianca’ full of summer fruits is wonderfully refreshing, with a slightly spicy accent.',
                'image' => '/images/sea_cocktails.jpg',
            ],
            [
                'name' => 'DAIQUIRI',
                'price' => 55000,
                'description' => 'There is no better way to let your hair down after a long week than enjoying our Daiquiri and Sunset. ',
                'image' => '/images/daiquiri.jpg',
            ],
            [
                'name' => 'LEMON COCKTAILS',
                'price' => 70000,
                'description' => 'The best way to spend the night is with a glass of your favorite cocktails!',
                'image' => '/images/lemon_cocktails.jpg',
            ],
        ];

        $cartCount = CartMenu::count();

        return view('menu', compact('menuItems', 'cartCount'));
    }

    public function viewOrder() {
        $cartItems = CartMenu::all();
        $totalPayment = CartMenu::sum(DB::raw('price * quantity'));

        return view('view_order', compact('cartItems', 'totalPayment'));
    }

    public function updateQuantity(Request $request, $id) {
        $item = CartMenu::findOrFail($id);

        // Update quantity berdasarkan aksi
        if ($request->action == 'increase') {
            $item->quantity += 1;
        } elseif ($request->action == 'decrease' && $item->quantity > 1) {
            $item->quantity -= 1;
        }

        $item->save();

        // Hitung ulang total payment
        $totalPayment = CartMenu::sum(DB::raw('price * quantity'));

        // Redirect kembali dengan total payment
        return redirect()->back()->with([
            'success' => 'Quantity updated!',
            'totalPayment' => $totalPayment
        ]);
    }

    public function removeFromCart($id) {
        CartMenu::destroy($id);
        return redirect()->back();
    }

    public function saveOrder() {
        // Simpan order ke tabel orders, atau proses lainnya.
        CartMenu::truncate(); // Kosongkan cart setelah save
        return redirect()->route('resto.menu')->with('success', 'Order saved successfully!');
    }
}
