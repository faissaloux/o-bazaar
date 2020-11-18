<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
use App\Models\Product;
use App\Models\ProductCategories;
use App\Models\Slider;
use App\Models\Stores;
use App\Models\User;
use App\Models\WishList;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    /**
     * Login user.
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        $rules = [
            'email'    => 'required|email',
            'password' => 'required',
        ];

        $login = $request->validate($rules);

        if ( !Auth::attempt( $login ) ) {
            return new JsonResponse(['error' => 'Invalid credentials']);
        }

        $accessToken = Auth::user()->createToken('auhtenticate')->accessToken;

        return new JsonResponse([
            'success' => 'logged in !',
            'accessToken' => $accessToken
        ]);
    }
    

    /**
     * Get user informations.
     * 
     * @return JsonResponse
     */
    public function profile()
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        return new JsonResponse([
            'user' => $user
        ]);
    }

    /**
     * Update user name/email.
     * 
     * @param int $request
     * @return JsonResponse
     */
    public function updateProfile(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Profile updated successfully!'
        ]);
    }

    /**
     * Bring addresses.
     * 
     * @return JsonResponse
     */
    public function indexAdresses()
    {
        $addresses = Addresses::get();

        return new JsonResponse([
            'addresses' => $addresses
        ]);
    }

    /**
     * Add address.
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function addAddress(Request $request)
    {
        $user_id = Auth::user()->id;
        $address = new Addresses;
        $address->countrycode = $request->countrycode;
        $address->street = $request->street;
        $address->housenumber = $request->housenumber;
        $address->state = $request->state;
        $address->city = $request->city;
        $address->postalcode = $request->postalcode;
        $address->latitude = $request->latitude;
        $address->longitude = $request->longitude;
        $address->phone = $request->phone;
        $address->user_id = $user_id;
        $address->is_primary = $request->is_primary;
        $address->is_billing = $request->is_billing;
        $address->is_shipping = $request->is_shipping;
        $address->save();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Address added successfully!'
        ]);
    }

    /**
     * Update address.
     * 
     * @param int $request
     * @return JsonResponse
     */
    public function updateAddress(Request $request)
    {
        $user_id = Auth::user()->id;
        $address = Addresses::where('user_id', $user_id)->get();
        $address->street = $request->street;
        $address->housenumber = $request->housenumber;
        $address->state = $request->state;
        $address->city = $request->city;
        $address->phone = $request->phone;
        $address->save();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Address updated successfully!'
        ]);

    }

    /**
     * Delete address.
     * 
     * @return JsonResponse
     */
    public function removeAddress()
    {
        $user_id = Auth::user()->id;
        $address = Addresses::where('user_id', $user_id)->get();
        $address->delete();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Address removed successfully!'
        ]);
    }

    /**
     * Bring wishlists.
     * 
     * @return JsonResponse
     */
    public function indexWishlist()
    {
        $wishlist = WishList::get();

        return new JsonResponse([
            'wishlist' => $wishlist
        ]);
    }

    /**
     * Add wishlist.
     * 
     * @param int $store_id
     * @param int $product_id
     * 
     * @return JsonReposnse
     */
    public function addWishlist($store_id, $product_id)
    {
        $user_id = Auth::user()->id;
        $wishlist = new WishList;
        $wishlist->user_id = $user_id;
        $wishlist->store_id = $store_id;
        $wishlist->productID = $product_id;
        $wishlist->save();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Wishlist added successfully!'
        ]);
    }

    /**
     * Update wishlist.
     */
    public function updateWishlist($store_id, $product_id, $wishlist_id)
    {
        $user_id = Auth::user()->id;
        $wishlist = WishList::find($wishlist_id);
        $wishlist->user_id = $user_id;
        $wishlist->store_id = $store_id;
        $wishlist->productID = $product_id;
        $wishlist->save();

        return new JsonResponse([s
            'status' => 'success',
            'message' => 'Wishlist updated successfully!'
        ]);
    }

    /**
     * Delete wishlist.
     * 
     * @param int $wishlist_id
     * @return JsonResponse
     */
    public function removeWishlist($wishlist_id)
    {
        $wishlist = WishList::find($wishlist_id);
        $wishlist->delete();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Wishlist removed successfully!'
        ]);
    }

    /**
     * Update user password.
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function updatePassword(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $user->password = \Hash::make($request->password);
        $user->save();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Password updated successfully!'
        ]);
    }

    /**
     * Logout user.
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return new JsonResponse([
            'success' => 'logout'
        ]);
    }

    public function storesIndex()
    {
        $stores = Stores::get();

        return new JsonResponse([
            'stores' => $stores
        ]);
    }


    /**
     * Search process.
     * 
     * @param Request $request
     * @param int $store_id
     * @return JsonResponse
     */
    public function search(Request $request, $store_id)
    {
        $q          = $request->q;
        $lang       = \App::getLocale();
        $products   = Product::Merchant()->Active()->where('name->'.$lang,'LIKE','%' . $q . '%')
                                         ->where('store_id' , $store_id)->paginate(10);
        $products->appends(['q' => $q]);
        $count      = $products ->count();

        return new JsonResponse([
            'products' => $products,
            'q' => $q,
            'count' => $count
        ]);
    }

    /**
     * Get store products, slider and categories.
     * 
     * @param int $store_id
     * @return JsonResponse
     */
    public function storeProducts($store_id)
    {
        $products = Product::where('store_id', $store_id)->get();
        $sliders = Slider::where('store_id', $store_id)->get();
        $categories = ProductCategories::where('store_id', $store_id)->get();
        // Get pagination
        return new JsonResponse([
            'products' => $products,
            'sliders' => $sliders,
            'categories' => $categories
        ]);
    }

    /**
     * Get product details and wishlist.
     * 
     * @param int $store_id
     * @param int $product_id
     * @return JsonResponse
     */
    public function productDetails($store_id, $product_id)
    {
        $products = Product::where('id', $product_id)->get();
        $wishList = WishList::where('store_id', $store_id)->get();
        return new JsonResponse([
            'products' => $products,
            'wishList' => $wishList
        ]);
    }

    /**
     * Get products by category.
     * 
     * @param int $store_id
     * @param int $category_id
     * @return JsonResponse
     */
    public function categoryProducts($store_id, $category_id)
    {
        $products = Product::where('store_id', $store_id)
                            ->where('categoryID', $category_id)
                            ->get();

        return new JsonResponse([
            'products' => $products
        ]);
    }
}
