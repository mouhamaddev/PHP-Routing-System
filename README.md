## PHP Routing System

This project provides a basic PHP routing framework for building web APIs. It defines routes for handling different API endpoints and facilitates request dispatching based on HTTP methods (GET, POST, etc.).

## Features
    - Flexible Routing: Define routes with HTTP methods for granular control.
    - Controller-Based Actions: Separate logic into reusable controller classes and methods.
    - Request Data Access: Retrieve request data from GET parameters or JSON payloads.
    - Error Handling: Catch exceptions and return well-formatted error responses.
    - Database Integration: Easily integrate with databases using external libraries like PDO.

## Usage:
    - Configure routes in config/routes.php
    - Configure your database in utils/db.php
    - Implement controller logic in controller/ directory
    - Access endpoints: GET https://domain.com/api/endpoint

## Project Structure:
    - index.php: The entry point for your application.
    - router.php: Defines the Router class for managing routes and dispatching.
    - response.php: Provides utility functions for building JSON responses.
    - config/routes.php: Configures your application's routes.
    - controller/: Contains controller classes for handling API requests.
    - utils/: Place for utility functions like database interaction.

## Additional Notes:

    This is a basic routing system. Consider extending it with features like middleware, parameter matching, URL generation, and more.
    Implement security measures to protect against common web vulnerabilities like XSS and CSRF.
