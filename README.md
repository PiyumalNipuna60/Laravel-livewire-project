# Laravel Livewire Product Inventory System

A modern, real-time product inventory management system built with Laravel and Livewire. This application provides a seamless user experience for managing product inventory with features like real-time updates, search, sorting, and modern UI components.

## Features

- 🚀 **Real-time Updates**: Built with Laravel Livewire for dynamic, real-time interactions without writing JavaScript
- 📱 **Responsive Design**: Modern, mobile-friendly interface using Tailwind CSS
- 🔍 **Advanced Search**: Real-time search functionality across product details
- 📊 **Sortable Columns**: Sort products by any column (name, SKU, quantity, price)
- 📝 **CRUD Operations**: 
  - Create new products with auto-generated SKUs
  - Read product details in a clean, organized table
  - Update product information
  - Delete products with confirmation modal
- 🔔 **Modern Notifications**: Toast-style notifications for all actions
- 🎯 **Pagination**: Efficient data loading with customizable items per page
- 🛡️ **Form Validation**: Comprehensive validation for all product fields
- 💾 **Data Persistence**: MySQL database integration

## Requirements

- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL
- XAMPP (or similar local development environment)

## Installation

1. Clone the repository:
```bash
git clone [repository-url]
cd laravel-livewire-project
```

2. Install PHP dependencies:
```bash
composer install
```

3. Install NPM dependencies:
```bash
npm install
```

4. Create a copy of the environment file:
```bash
cp .env.example .env
```

5. Generate application key:
```bash
php artisan key:generate
```

6. Configure your database in `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

7. Run database migrations:
```bash
php artisan migrate
```

8. Start the development server:
```bash
php artisan serve
```

9. In a separate terminal, start Vite for asset compilation:
```bash
npm run dev
```

## Usage

1. Access the application at `http://localhost:8000`
2. Navigate to the products page to start managing your inventory
3. Use the search bar to find specific products
4. Click column headers to sort the table
5. Use the "Add Product" button to create new products
6. Edit or delete products using the action buttons
7. Adjust items per page using the dropdown at the bottom

## Project Structure

```
├── app/
│   ├── Livewire/
│   │   ├── Products/
│   │   │   ├── Form.php      # Product form component
│   │   │   │   └── Index.php     # Product listing component
│   │   │   └── Modal.php         # Modal component
│   │   └── Models/
│   │       └── Product.php       # Product model
│   ├── resources/
│   │   ├── views/
│   │   │   ├── components/
│   │   │   │   └── notification.blade.php  # Toast notifications
│   │   │   ├── livewire/
│   │   │   │   ├── products/
│   │   │   │   │   ├── form.blade.php      # Product form view
│   │   │   │   │   └── index.blade.php     # Product listing view
│   │   │   │   └── modal.blade.php         # Modal view
│   │   │   └── layouts/
│   │   │       └── app.blade.php           # Main layout
│   └── database/
│       └── migrations/           # Database migrations
```

## Technologies Used

- [Laravel](https://laravel.com/) - PHP Framework
- [Livewire](https://livewire.laravel.com/) - Full-stack framework for Laravel
- [Tailwind CSS](https://tailwindcss.com/) - Utility-first CSS framework
- [Alpine.js](https://alpinejs.dev/) - Lightweight JavaScript framework
- [MySQL](https://www.mysql.com/) - Database

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Acknowledgments

- Laravel team for the amazing framework
- Caleb Porzio for Livewire
- All contributors who have helped shape this project
