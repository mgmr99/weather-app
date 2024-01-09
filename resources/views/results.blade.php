<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="styles.css">
<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Ruda:wght@400;600;700&display=swap");

    * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    }

    body {
    background-color: #37474f;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: "poppins", sans-serif;
    }

    .container {
    max-width: 800px;
    width: 100%;
    background-color: #232931;
    color: #fff;
    border-radius: 25px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
    }

    .wrapper {
    display: grid;
    grid-template-columns: 3fr 4fr;
    grid-gap: 1rem;
    }

    img{
    width: 100%;
    }

    .img_section {
    border-radius: 25px;
    background-image: url("../img/bg.jpg");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
    transform: scale(1.03) perspective(200px);
    }

    .img_section::before {
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #5c6bc0 10%, #0d47a1 100%);
    opacity: 0.5;
    z-index: -1;
    border-radius: 25px;
    }

    .default_info {
    padding: 1.5rem;
    text-align: center;
    }

    .default_info img {
    width: 80%;
    object-fit: cover;
    margin: 0 auto;
    }

    .default_info h2 {
    font-size: 3rem;
    }

    .default_info h3 {
    font-size: 1.3rem;
    text-transform: capitalize;
    }

    .weather_temp {
    font-size: 4rem;
    font-weight: 800;
    }

    /* content section */
    .content_section {
    padding: 1.5rem;
    }

    .content_section form {
    margin: 1.5rem 0;
    position: relative;
    }

    .content_section form input {
    width: 84%;
    outline: none;
    background: transparent;
    border: 1px solid #37474f;
    border-radius: 5px;
    padding: 0.7rem 1rem;
    font-family: inherit;
    color: #fff;
    font-size: 1rem;
    }

    .content_section form button {
    position: absolute;
    top: 0;
    right: 0;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
    padding: 1rem 0.7rem;
    font-family: inherit;
    font-size: 0.8rem;
    outline: none;
    border: none;
    background: #5c6bc0;
    color: #fff;
    cursor: pointer;
    }

    .day_info .content {
    display: flex;
    justify-content: space-between;
    padding: 0.4rem 0;
    }

    .day_info .content .title {
    font-weight: 600;
    }

    .list_content ul {
    display: flex;
    justify-content: space-between;
    align-items: center;
    list-style-type: none;
    margin: 3rem 0rem;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
    }

    .list_content ul li {
    padding: 0.5rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    border-radius: 1rem;
    transition: all 0.3s ease-in;
    }

    .list_content ul li:hover {
    transform: scale(1.1);
    background-color: #fff;
    color: #232931;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
    cursor: pointer;
    }

    .list_content ul li img {
    width: 50%;
    object-fit: cover;
    }

    .icons {
    opacity: 1;
    }

    .icons.fadeIn {
    animation: 0.5s fadeIn forwards;
    animation-delay: 0.7s;
    }

    @keyframes fadeIn {
    to {
        transition: all 0.5s ease-in;
        opacity: 1;
    }
    }
</style>    
</head>
<body>
    <div class="container">
        <div class="wrapper">
          <div class="img_section">
            <div class="default_info">
              <h2 class="default_day">{{ now()->format('l') }}</h2>
              <span class="default_date">{{ now()->format('Y-m-d') }}</span>
              <div class="icons">
                <img src="{{ $iconUrl }}" alt="" />
                <h2 class="weather_temp">{{ $temp }}°C</h2>
                <h3 class="cloudtxt">{{ $weatherDescription }}</h3>
              </div>
            </div>
          </div>
          <div class="content_section">
            <form action="{{ route('search') }}" method="post">
                @csrf
              <input type="text" placeholder="Enter a city" name="city" />
              <button type="submit">Search</button>
            </form>
            <div class="day_info">
              <div class="content">
                <p class="title">City</p>
                <span class="value">{{ $city }}</span>
              </div>
              <div class="content">
                <p class="title">Country Code</p>
                <span class="value">{{ $country }}</span>
              </div>
              <div class="content">
                <p class="title">TEMP</p>
                <span class="value">{{ $temp }}°C</span>
              </div>
              <div class="content">
                <p class="title">HUMIDITY</p>
                <span span class="value">{{ $humidity }}%</span>
              </div>
              <div class="content">
                <p class="title">WIND SPEED</p>
                <span class="value">{{ $wind }}Km/h</span>
              </div>
            </div>
            <div class="list_content">
              <ul>
                <li>
                  <img src="{{ $icon0Url }}" />
                  <span>{{ date("l", strtotime("+1 day")) }}</span>
                  <span class="day_temp">{{$day0Temp}}°C</span>
                </li>
                <li>
                  <img src="{{ $icon1Url }}" />
                  <span>{{ date("l", strtotime("+2 day")) }}</span>
                  <span class="day_temp">{{$day1Temp}}°C</span>
                </li>
                <li>
                  <img src="{{ $icon2Url }}" />
                  <span>{{ date("l", strtotime("+3 day")) }}</span>
                  <span class="day_temp">{{$day2Temp}}°C</span>
                </li>
                <li>
                  <img src="{{ $icon3Url }}" />
                  <span>{{ date("l", strtotime("+4 day")) }}</span>
                  <span class="day_temp">{{$day3Temp}}°C</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

</body>
</html>