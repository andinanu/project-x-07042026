🚀 Installation Guide
Please follow these steps in order to ensure the environment is configured correctly.

1. Clone the Repository
```Bash
git clone <your-repo-url>
cd <project-folder-name>
```

2. Install Dependencies
```Bash
# Install PHP dependencies
composer install

# Install Frontend dependencies (Bootstrap, jQuery, SweetAlert2)
npm install
```

3. Environment Setup
```Bash
# Create your .env file
cp .env.example .env

# Generate the application encryption key
php artisan key:generate
Note: Please update the DB_DATABASE, DB_USERNAME, and DB_PASSWORD in your .env file to match your local database settings.
```

4. Database Migration & Seeding
This will create the tables and populate the database with realistic products (Laptops, Stationery, etc.) using Faker.

```Bash
php artisan migrate --seed
```

5. Compile Assets
To ensure the styling and JavaScript components (jQuery/Swal) work correctly:

```Bash
# Build for production
npm run build
```
💻 Running the Application
Start the Laravel development server:

```Bash
php artisan serve
```

The application will be available at: http://127.0.0.1:8000

📖 API Documentation
This project includes self-hosted API documentation. You can view the available endpoints, request parameters, and example responses by visiting:

URL: http://127.0.0.1:8000/docs