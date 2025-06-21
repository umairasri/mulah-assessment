#!/bin/bash

# Internship Assessment - Heroku Deployment Script

echo "🚀 Starting deployment to Heroku..."

# Check if Heroku CLI is installed
if ! command -v heroku &> /dev/null; then
    echo "❌ Heroku CLI is not installed. Please install it first."
    exit 1
fi

# Check if user is logged in to Heroku
if ! heroku auth:whoami &> /dev/null; then
    echo "🔐 Please login to Heroku first:"
    heroku login
fi

# Get app name from user
read -p "Enter your Heroku app name: " APP_NAME

# Create app if it doesn't exist
if ! heroku apps:info $APP_NAME &> /dev/null; then
    echo "📱 Creating new Heroku app: $APP_NAME"
    heroku create $APP_NAME
else
    echo "📱 Using existing Heroku app: $APP_NAME"
fi

# Set buildpack
echo "🔧 Setting PHP buildpack..."
heroku buildpacks:set heroku/php -a $APP_NAME

# Generate app key
echo "🔑 Generating application key..."
APP_KEY=$(php artisan key:generate --show)

# Set environment variables
echo "⚙️ Setting environment variables..."
heroku config:set APP_KEY="$APP_KEY" -a $APP_NAME
heroku config:set APP_ENV=production -a $APP_NAME
heroku config:set APP_DEBUG=false -a $APP_NAME

# Commit changes if needed
if [[ -n $(git status --porcelain) ]]; then
    echo "💾 Committing changes..."
    git add .
    git commit -m "Deploy to Heroku - $(date)"
fi

# Deploy to Heroku
echo "🚀 Deploying to Heroku..."
git push heroku main

# Open the application
echo "🌐 Opening application..."
heroku open -a $APP_NAME

echo "✅ Deployment completed successfully!"
echo "📊 Your application is now live at: https://$APP_NAME.herokuapp.com" 