<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ForgotPasswordController;
use App\Http\Controllers\Admin\ResetPasswordController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Agents\AgentController;
use App\Http\Controllers\Admin\Category\SubCategoryController;
use App\Http\Controllers\Admin\Brand\BrandController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Coupon\CouponController;
use App\Http\Controllers\Admin\Newslater\NewslaterController;
use App\Http\Controllers\Admin\Post\PostController;
use App\Http\Controllers\wishlistController;


Route::get('/', function () {return view('frontend.index');});
//auth & user
Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/password/change', [HomeController::class, 'changePassword'])->name('password.change');
Route::post('/password/update', [HomeController::class, 'updatePassword'])->name('password.update');
Route::get('/logout', [HomeController::class, 'Logout']);

//admin=======
Route::get('admin/home', [AdminController::class, 'index']);
Route::get('admin', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin', [LoginController::class, 'login']);

// Password Reset Routes...
Route::get('admin/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
Route::post('admin-password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
Route::get('admin/reset/password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');
Route::post('admin/update/reset', [ResetPasswordController::class, 'reset'])->name('admin.reset.update');
Route::get('/admin/Change/Password', [AdminController::class, 'ChangePassword'])->name('admin.password.change');
Route::post('/admin/password/update', [AdminController::class, 'Update_pass'])->name('admin.password.update');
Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


  //admin section----------------

 //Admin Agents routes
Route::get('agent', [AgentController::class, 'Agents']);
Route::get('delete/agent/{id}', [AgentController::class, 'DeleteAgent']);
Route::get('view/agent/{id}', [AgentController::class, 'ViewAgent']);

 //Admin City type routes
Route::get('/city', [CategoryController::class, 'City']);
Route::post('/store/city', [CategoryController::class, 'StoreCity']);
Route::get('edit/city/{id}', [CategoryController::class, 'EditCity']);
Route::post('update/city/{id}', [CategoryController::class, 'UpdateCity']);
Route::get('delete/city/{id}', [CategoryController::class, 'DeleteCity']);

 //Admin property type routes
Route::get('/property/type', [CategoryController::class, 'PropertyType']);
Route::post('/store/property/type', [CategoryController::class, 'StorePropertyType']);
Route::get('delete/property/{id}', [CategoryController::class, 'DeletePropertyType']);
Route::get('edit/property/{id}', [CategoryController::class, 'EditPropertyType']);
Route::post('update/property/{id}', [CategoryController::class, 'UpdatePropertyType']);

 //Admin property status routes
Route::get('property/status', [CategoryController::class, 'PropertyStatus']);
Route::post('store/property/status', [CategoryController::class, 'StorePropertyStatus']);
Route::get('delete/property/status/{id}', [CategoryController::class, 'DeletePropertyStatus']);
Route::get('edit/property/status/{id}', [CategoryController::class, 'EditPropertyStatus']);
Route::post('update/property/status/{id}', [CategoryController::class, 'UpdatePropertyStatus']);

//Admin Settings routes
Route::get('settings', [SettingController::class, 'Settings']);
Route::post('Update/Setting/{id}', [SettingController::class, 'UpdateSettings']);
Route::post('update/banner/photo/{id}', [SettingController::class, 'UpdateSettingsBannerPhoto']);

//Admin Settings routes
Route::get('admin/create/role', [SettingController::class, 'UserRole'])->name('create-user-role');
Route::get('admin/create/admin', [SettingController::class, 'UserCreate'])->name('create-admin');
Route::post('admin/store/admin', [SettingController::class, 'UserStore'])->name('store-admin');
Route::get('delete/admin/{id}', [SettingController::class, 'UserDelete']);
Route::get('edit/admin/{id}', [SettingController::class, 'UserEdit']);
Route::post('admin/update/admin', [SettingController::class, 'UserUpdate'])->name('update-admin');



	//Frontend section----------------
// Frontend Agents Route.........
Route::post('Update/Agent/Profile{id}', [App\Http\Controllers\AgentController::class, 'UpdateAgentProfile']);
Route::post('Update/Agent/Profile/Social{id}', [App\Http\Controllers\AgentController::class, 'UpdateAgentProfileSocial']);
Route::post('Update/Profile/Photo{id}', [App\Http\Controllers\AgentController::class, 'UpdateProfilePhoto']);
		
// Frontend Route.........
Route::get('/Listing-Property', [FrontController::class, 'PropertyListing']);
Route::get('/contact', [FrontController::class, 'Contact']);
Route::get('/Property/Details/{id}', [FrontController::class, 'PropertyDetails']);
Route::get('/Property-Favorite', [FrontController::class, 'PropertyFavorite']);
Route::get('/Property-Agent', [FrontController::class, 'PropertyAgent']);
Route::get('/Property/Agent/Profile/{id}', [FrontController::class, 'PropertyAgentProfile']);
Route::get('/Property-Testimonial', [FrontController::class, 'PropertyTestimonial']);
Route::get('/Error', [FrontController::class, 'Error']);
Route::get('/Features-Blog', [FrontController::class, 'FeaturesBlog']);
Route::get('/blog-details', [FrontController::class, 'BlogDetails']);
Route::get('/Features-Faqs', [FrontController::class, 'FeaturesFAQS']);

Route::get('/Submit-Property', [FrontController::class, 'SubmitProperty']);
Route::get('/My-Property/{id}', [FrontController::class, 'MyProperty']);
Route::get('/Agent/Property/Details/{id}', [FrontController::class, 'MyPropertyDetails']);

Route::post('Property/Search', [FrontController::class, 'PropertySearch'])->name('Property/Search');

// Frontend Property Submit Route.........
Route::post('/Store/Property', [PropertyController::class, 'StoreProperty']);



// // Newslater Route
// Route::get('/admin-newslater', [NewslaterController::class, 'admin_newslater']);
// Route::get('delete-subscriber/{id}', [NewslaterController::class, 'delete_subscriber']);
// Route::get('admin-seo', [NewslaterController::class, 'Seo']);
// Route::post('update-seo', [NewslaterController::class, 'UpdateSeo']);

// // Product route
// Route::get('/all-product', [ProductController::class, 'all_product']);
// Route::get('/add-product', [ProductController::class, 'add_product']);
// Route::post('/store-product', [ProductController::class, 'store_product']);
// Route::get('inactive-product/{id}', [ProductController::class, 'inactive_product']);
// Route::get('active-product/{id}', [ProductController::class, 'active_product']);
// Route::get('delete-product/{id}', [ProductController::class, 'delete_product']);
// Route::get('view-product/{id}', [ProductController::class, 'view_product']);
// Route::get('edit-product/{id}', [ProductController::class, 'edit_product']);
// Route::post('update-product-without-img/{id}', [ProductController::class, 'update_product_without_img']);
// Route::post('update-product-with-img/{id}', [ProductController::class, 'update_product_with_img']);

// // Admin Blog route
// Route::get('/add-blogpost', [PostController::class, 'add_blogpost']);
// Route::get('/all-blogpost', [PostController::class, 'all_blogpost']);
// Route::post('/store-post', [PostController::class, 'store_post']);
// Route::get('delete-post/{id}', [PostController::class, 'delete_post']);
// Route::get('edit-post/{id}', [PostController::class, 'edit_post']);
// Route::post('update-post/{id}', [PostController::class, 'update_post']);


// // subcategory by ajax
// Route::get('/get/subcategory/{category_id}', [ProductController::class, 'get_subcategory']);


// // wishlist
// Route::get('add/wishlist/{id}', [wishlistController::class, 'add_wishlist']);
// Route::get('delete/wishlist/{id}', [wishlistController::class, 'DeleteWishlist']);



// //frontedn all routesa are here--------
// Route::post('store/newslater', 'FrontController@StoreNewslater')->name('store.newslater');