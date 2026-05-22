<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\ServiceController as AdminService;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\OrderController as AdminOrder;
use App\Http\Controllers\Admin\PaymentController as AdminPayment;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Customer\DashboardController as CustomerDashboard;
use App\Http\Controllers\Customer\OrderController as CustomerOrder;
use App\Http\Controllers\Customer\PaymentController as CustomerPayment;
use App\Http\Controllers\Customer\ProfileController;
use App\Http\Controllers\AI\ChatbotController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/tracking', [TrackingController::class, 'index'])->name('tracking');
Route::post('/tracking', [TrackingController::class, 'search'])->name('tracking.search');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::get('/register', [RegisterController::class, 'show'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/forgot-password', [ForgotPasswordController::class, 'show'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'send'])->name('password.email');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
    
    // Services CRUD
    Route::resource('services', AdminService::class);
    
    // Customers CRUD
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/customers/{user}', [CustomerController::class, 'show'])->name('customers.show');
    Route::delete('/customers/{user}', [CustomerController::class, 'destroy'])->name('customers.destroy');
    
    // Orders
    Route::get('/orders', [AdminOrder::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [AdminOrder::class, 'show'])->name('orders.show');
    Route::get('/orders/{order}/edit', [AdminOrder::class, 'edit'])->name('orders.edit');
    Route::patch('/orders/{order}', [AdminOrder::class, 'update'])->name('orders.update');
    Route::patch('/orders/{order}/status', [AdminOrder::class, 'updateStatus'])->name('orders.status');
    Route::get('/orders/{order}/invoice', [AdminOrder::class, 'invoice'])->name('orders.invoice');
    Route::get('/orders/{order}/invoice/pdf', [AdminOrder::class, 'downloadInvoice'])->name('orders.invoice.pdf');
    
    // Payments
    Route::get('/payments', [AdminPayment::class, 'index'])->name('payments.index');
    Route::patch('/payments/{payment}/verify', [AdminPayment::class, 'verify'])->name('payments.verify');
    Route::patch('/payments/{payment}/reject', [AdminPayment::class, 'reject'])->name('payments.reject');
    
    // Reports
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/data', [ReportController::class, 'data'])->name('reports.data');
});

// Customer Routes
Route::prefix('customer')->middleware(['auth', 'role:customer'])->name('customer.')->group(function () {
    Route::get('/dashboard', [CustomerDashboard::class, 'index'])->name('dashboard');
    
    // AI Chatbot Routes
    Route::prefix('ai')->name('ai.')->group(function () {
        Route::get('/chatbot', [ChatbotController::class, 'index'])->name('chatbot');
        Route::post('/chat', [ChatbotController::class, 'chat'])->name('chat');
        Route::post('/clear', [ChatbotController::class, 'clear'])->name('clear');
    });
    
    // Orders
    Route::get('/orders/create', [CustomerOrder::class, 'create'])->name('orders.create');
    Route::post('/orders', [CustomerOrder::class, 'store'])->name('orders.store');
    Route::get('/orders', [CustomerOrder::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [CustomerOrder::class, 'show'])->name('orders.show');
    
    // Payments
    Route::get('/payments/{order}/upload', [CustomerPayment::class, 'show'])->name('payments.upload');
    Route::post('/payments/{order}', [CustomerPayment::class, 'store'])->name('payments.store');
    
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});