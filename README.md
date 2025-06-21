# Internship Assessment - Table Processing Application

This Laravel application completes the internship assessment requirements for table processing and display.

## Features

- **Table 1 Display**: Shows the uploaded table data in the exact same format
- **Table 2 Processing**: Automatically calculates values based on formulas:
  - Alpha = A5 + A20
  - Beta = A15 / A7  
  - Charlie = A13 * A12
- **File Upload**: Supports CSV, TXT, XLSX, and XLS file formats
- **Real-time Processing**: Calculates integer values from the uploaded data
- **Responsive Design**: Modern, user-friendly interface

## Requirements

- PHP 8.1 or higher
- Composer
- Laravel 10.x
- Web server (Apache/Nginx)

## Installation

1. Clone the repository:
```bash
git clone <repository-url>
cd internship_assessment
```

2. Install dependencies:
```bash
composer install
```

3. Copy environment file:
```bash
cp .env.example .env
```

4. Generate application key:
```bash
php artisan key:generate
```

5. Configure your database in `.env` file (optional for this assessment)

6. Run the application:
```bash
php artisan serve
```

## Usage

1. Open your browser and navigate to `http://localhost:8000`
2. Download the table file from the assessment link
3. Upload the file using the form on the website
4. View both Table 1 (original data) and Table 2 (processed results)

## Deployment to Heroku

### Prerequisites
- Heroku account
- Heroku CLI installed

### Steps

1. **Login to Heroku:**
```bash
heroku login
```

2. **Create Heroku app:**
```bash
heroku create your-app-name
```

3. **Set buildpack:**
```bash
heroku buildpacks:set heroku/php
```

4. **Configure environment variables:**
```bash
heroku config:set APP_KEY=$(php artisan key:generate --show)
heroku config:set APP_ENV=production
heroku config:set APP_DEBUG=false
```

5. **Deploy the application:**
```bash
git add .
git commit -m "Initial deployment"
git push heroku main
```

6. **Open the application:**
```bash
heroku open
```

### Alternative: Deploy via Heroku Dashboard

1. Connect your GitHub repository to Heroku
2. Enable automatic deploys
3. Deploy manually or wait for automatic deployment

## File Structure

```
internship_assessment/
├── app/
│   └── Http/Controllers/
│       └── TableController.php    # Main controller for table processing
├── resources/
│   └── views/
│       └── index.blade.php        # Main view with tables and upload form
├── routes/
│   └── web.php                    # Application routes
└── README.md                      # This file
```

## Technical Implementation

### Table Processing Logic

The application processes table data through the following steps:

1. **File Upload**: Accepts various file formats (CSV, TXT, XLSX, XLS)
2. **Data Parsing**: Converts uploaded file to structured array format
3. **Cell Mapping**: Maps data to cells A1 through A25
4. **Formula Calculation**: 
   - Alpha = A5 + A20 (addition)
   - Beta = A15 / A7 (division)
   - Charlie = A13 * A12 (multiplication)
5. **Display**: Shows both original and processed data in formatted tables

### Key Features

- **Session Management**: Stores uploaded data in session for persistence
- **Error Handling**: Validates file uploads and provides user feedback
- **Responsive Design**: Works on desktop and mobile devices
- **Real-time Processing**: Calculates results immediately after upload

## Assessment Requirements Met

✅ **Table Display**: Table 1 displayed in exact same format  
✅ **Data Processing**: Table 2 shows calculated integer values  
✅ **Formula Implementation**: A5+A20, A15/A7, A13*A12 calculations  
✅ **Integer Output**: Results displayed as numbers, not strings  
✅ **Hosting Ready**: Configured for Heroku deployment  

## Support

For any issues or questions about the implementation, please refer to the Laravel documentation or contact the development team.

## License

This project is created for internship assessment purposes.
