# SuperMarket - Full-Stack Online Supermarket

SuperMarket is a full-stack e-commerce web application built as a college project to demonstrate proficiency in both front-end and back-end development. It simulates an online supermarket where users can browse products, manage their shopping cart, authenticate, and place orders. The project showcases a responsive user interface, secure user authentication, and robust back-end functionality.

## Features

- **Product Browsing**: View a catalog of products with details like name, price, category, and image.
- **Category Filtering**: Filter products by categories (e.g., Fruits, Vegetables) and sort by price or name.
- **Cart Management**: Add, update, or remove products from the shopping cart with real-time updates.
- **User Authentication**: Secure user registration and login using Laravel Breeze.
- **Checkout Process**: Complete orders with billing details, shipping options, and payment methods.
- **Contact Form**: Submit inquiries or feedback through a contact form.
- **Responsive Design**: Mobile-friendly interface built with Bootstrap and custom CSS.

## Installation

Follow these steps to set up the project locally:

1. **Clone the Repository**:

   ```bash
   git clone https://github.com/yourusername/supermarket.git
   cd supermarket
   ```

2. **Install PHP Dependencies**:

   ```bash
   composer install
   ```

3. **Install Front-End Dependencies**:

   ```bash
   npm install
   ```

4. **Configure Environment**:

   - Copy `.env.example` to `.env`:

     ```bash
     cp .env.example .env
     ```

   - Update `.env` with your database credentials:

     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=supermarket
     DB_USERNAME=root
     DB_PASSWORD=
     ```

5. **Generate Application Key**:

   ```bash
   php artisan key:generate
   ```

6. **Run Migrations**:

   ```bash
   php artisan migrate
   ```

7. **Seed Sample Data** (Optional):

   - Manually insert products using Laravel Tinker:

     ```bash
     php artisan tinker
     ```

     ```php
     use App\Models\Product;
     Product::create(['name' => 'Organic Apple', 'description' => 'Fresh organic apples', 'price' => 5.99, 'image' => 'imgs/product1.png', 'category' => 'Fruits']);
     Product::create(['name' => 'Fresh Carrots', 'description' => 'Fresh organic carrots', 'price' => 3.49, 'image' => 'imgs/product2.png', 'category' => 'Vegetables']);
     ```

8. **Compile Assets**:

   ```bash
   npm run dev
   ```

9. **Start the Development Server**:

   ```bash
   php artisan serve
   ```

   Access the application at `http://localhost:8000`.

