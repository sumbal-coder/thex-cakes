<?php

use App\Enums\PermissionEnum;
use App\Http\Controllers\ProfileController;
use App\Livewire\Frontend\Faq;
use App\Livewire\Frontend\Home;
use App\Livewire\Backend\Product;
use App\Livewire\Frontend\AboutUs;
use App\Livewire\Frontend\Products;
use App\Livewire\Frontend\ContactUs;
use Illuminate\Support\Facades\Route;
use App\Livewire\Backend\CreateProduct;
use App\Livewire\Backend\EditProduct;
use App\Livewire\Backend\Faq as BackendFaq;
use App\Livewire\Backend\AboutUs as BackendAboutUs;
use App\Livewire\Backend\Address as BackendAddress;
use App\Livewire\Backend\Content as BackendContent;
use App\Livewire\Backend\EditFaq as BackendEditFaq;
use App\Livewire\Backend\Role\Role as BackendRoleRole;
use App\Livewire\Backend\User\User as BackendUserUser;
use App\Livewire\Backend\User\RoleSetting as BackendUserRoleSetting;
use App\Livewire\Backend\CreateFaq as BackendCreateFaq;
use App\Livewire\Backend\Role\EditRole as BackendRoleEditRole;
use App\Livewire\Backend\User\EditUser as BackendUserEditUser;
use App\Livewire\Backend\User\CreateUser as BackendUserCreateUser;
use App\Livewire\Backend\Role\CreateRole  as BackendRoleCreateRole;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', BackendUserUser::class)->can(PermissionEnum::VIEW_USERS->value);
        Route::get('/create', BackendUserCreateUser::class)->can(PermissionEnum::ADD_USERS->value);
        Route::get('/edit/{user}', BackendUserEditUser::class)->can(PermissionEnum::EDIT_USERS->value);
        Route::get('/settings/{user}', BackendUserRoleSetting::class)->can(PermissionEnum::EDIT_USERS_ROLE->value);
    });

    Route::group(['prefix' => 'roles'], function () {
        Route::get('/', BackendRoleRole::class)->can(PermissionEnum::VIEW_ROLES->value);
        Route::get('/create', BackendRoleCreateRole::class)->can(PermissionEnum::ADD_ROLES->value);
        Route::get('edit/{role}', BackendRoleEditRole::class)->can(PermissionEnum::EDIT_ROLES->value);
    });

    Route::get('/product', Product::class)->can(PermissionEnum::VIEW_PRODUCTS->value);
    Route::get('/product/create', CreateProduct::class)->can(PermissionEnum::ADD_PRODUCTS->value);
    Route::get('/product/edit/{product}', EditProduct::class)->can(PermissionEnum::EDIT_PRODUCTS->value);

    
    Route::get('content/faq', BackendFaq::class)->can(PermissionEnum::VIEW_FAQS->value);
    Route::get('content/faq/create', BackendCreateFaq::class)->can(PermissionEnum::ADD_FAQS->value);
    Route::get('content/faq/edit/{faq}', BackendEditFaq::class)->can(PermissionEnum::EDIT_FAQS->value);
    
    Route::get('content/about-us', BackendAboutUs::class)->can(PermissionEnum::EDIT_ABOUT_US->value);
    Route::get('/address', BackendAddress::class)->can(PermissionEnum::EDIT_ADDRESS->value);
    Route::get('/content/page', BackendContent::class)->can(PermissionEnum::EDIT_CONTENT->value);
});

Route::get('/home', Home::class);
Route::get('/products', Products::class);
Route::get('/contact-us', ContactUs::class);
Route::get('/about-us', AboutUs::class);
Route::get('/faq', Faq::class);

require __DIR__ . '/auth.php';
