#  Apple Store E-Commerce (Laravel)

> A premium, dark-themed E-Commerce web application designed for selling Apple products. Features a modern glassmorphism UI, real-time search, admin dashboard with stock alerts, and WhatsApp integration.

![Apple Store Banner](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg)

## ✨ Key Features

### 🛍️ User Experience (Front-End)
*   **Premium Dark UI:** "Apple-style" aesthetics with glassmorphism, smooth animations, and a clean dark theme.
*   **Live Search (AJAX):** Instantly search products by **Name**, **Description**, or **Price** without reloading the page.
*   **Hero Landing Page:** Animated intro sequence revealing products smoothly.
*   **Product Detail:** Comprehensive product showcase with large visuals and stock information.
*   **Direct Purchase:**
    *   **Order Form:** Modal-based checkout system (Delivery/Pickup).
    *   **WhatsApp Integration:** "Chat with Admin" button pre-fills a message with the specific product details.
*   **Responsive Design:** Fully optimized for Desktop, Tablet, and Mobile.

### 🛠️ Admin Dashboard (Back-End)
*   **Dashboard Overview:**
    *   **Real-time Notification:** Red notification badge on the sidebar showing the count of **Pending Orders**.
*   **Product Management (CRUD):**
    *   Add, Edit, and Delete products with image upload support.
    *   **Smart Stock Alert:** Rows turn **Red** and show a warning badge when stock is **≤ 5**.
    *   **Auto-Cleanup:** Automatically deletes old product images from storage when a product is deleted.
*   **Order Management:**
    *   View incoming orders with customer details (Name, Address, Delivery Method).
    *   Clear status indicators.
*   **User Management:** Manage admin/staff accounts with circular avatar previews.
*   **Secure Authentication:** Powered by Laravel Auth (Login/Logout).

## 🚀 Technology Stack

*   **Framework:** Laravel 6.x (PHP)
*   **Database:** MySQL
*   **Frontend:** Blade Templates, Bootstrap 4, Custom CSS (Glassmorphism), jQuery (AJAX).
*   **Assets:** FontAwesome / Bootstrap Icons.

## 📦 Installation Guide

### Prerequisites
*   PHP >= 7.2.5
*   Composer
*   MySQL Server (XAMPP/Laragon/Docker)

### Steps

1.  **Clone the Repository**
    ```bash
    git clone https://github.com/username/apple-store-ecommerce.git
    cd apple-store-ecommerce
    ```

2.  **Install Dependencies**
    ```bash
    composer install
    ```

3.  **Environment Setup**
    *   Copy the example environment file:
        ```bash
        cp .env.example .env
        ```
    *   Open `.env` and configure your database settings:
        ```env
        DB_DATABASE=ecommerce_db
        DB_USERNAME=root
        DB_PASSWORD=
        ```

4.  **Generate Key**
    ```bash
    php artisan key:generate
    ```

5.  **Database Migration & Seeding**
    Run the migrations to create the required tables (`users`, `ecommerce`, `orders`).
    ```bash
    php artisan migrate
    ```
    *(Optional) Seed dummy data if available:*
    ```bash
    php artisan db:seed
    ```

6.  **Storage Link**
    Link the public storage to serve product images.
    ```bash
    php artisan storage:link
    ```

7.  **Run the Server**
    ```bash
    php artisan serve
    ```
    Access the app at: `http://localhost:8000`

## 📂 Project Structure

*   `app/Http/Controllers/VisitorController.php` - Handles public pages (Search, Live Search, Order).
*   `app/Http/Controllers/PageController.php` - Handles Admin pages (Product CRUD, Users, Orders).
*   `resources/views/search.blade.php` - The main landing page with Live Search.
*   `resources/views/layouts/main.blade.php` - The Admin Dashboard master layout.
*   `public/js/smooth-scroll.js` - Custom script for global smooth scrolling and ripple effects.

## 🎨 UI/UX Highlights

*   **Glassmorphism:** Translucent navbars and cards using `backdrop-filter: blur()`.
*   **Animations:**
    *   `heroFadeIn`: Landing page title animation.
    *   `ripple`: Click feedback on buttons.
    *   `hover`: Smooth scaling on product cards.

## 📝 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).