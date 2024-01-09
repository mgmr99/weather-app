# ![Weather App](weather-app.PNG)

A simple weather application built with Laravel 10 that utilizes the OpenWeather API to provide real-time weather information.

## Features

-   **Current Weather**: Get the current weather conditions for a specific location.
-   **Forecast**: Retrieve a 5-day weather forecast for a given location.

## Getting Started

### Prerequisites

-   PHP >= 7.4
-   Composer
-   Laravel CLI

### Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/your-username/your-weather-app.git

    ```

2. Navigate to the project directory:

    ```bash
    cd your-weather-app

    ```

3. Copy the .env.example file to .env and configure your API key:

    ```bash
    cp .env.example .env

    ```

4. Open the .env file and set your OpenWeather API key:

    ```bash
        OPENWEATHER_API_KEY=your-api-key

    ```

5. Run the migrations:

    ```bash
        php artisan migrate

    ```

6. Serve the application
    ```bash
        php artisan serve
    ```

Visit http://localhost:8000 in your browser.

## Usage

Navigate to the home page.
Enter the city name or coordinates.
Click on the "Search" button to retrieve current conditions or forecasts.

## Contributing

Contributions are welcome! Feel free to open an issue or submit a pull request.
