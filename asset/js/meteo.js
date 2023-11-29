const apiKey = "51ce942ff61d9f82281c4b75aae585ef";
const apiUrl = "https://api.openweathermap.org/data/2.5/weather?units=metric&q=";

document.addEventListener("DOMContentLoaded", () => {
  const searchBox = document.querySelector(".search input");
  const searchBtn = document.querySelector(".search button");
  const weatherIcon = document.querySelector(".weather-icon");

  if (searchBox && searchBtn && weatherIcon) {
    searchBtn.addEventListener("click", () => {
      checkWeather(searchBox.value);
    });
  } else {
    console.error("One or more elements not found.");
  }

  async function checkWeather(city) {
    const response = await fetch(apiUrl + city + `&appid=${apiKey}`);
    let data = await response.json();


    document.querySelector(".city").innerHTML = data.name.replace("Arrondissement de","");
    document.querySelector(".temp").innerHTML = Math.round(data.main.temp) + "°C";
    document.querySelector(".humidity").innerHTML = data.main.humidity + "%";
    document.querySelector(".wind").innerHTML = data.wind.speed + " km/h";

    if (data.weather[0].main == "Clouds") {
    
      
    } else if (data.weather[0].main == "Clear") {
        console.log("Weather is Clear");
      weatherIcon.src = "images/clear.png";
    } else if (data.weather[0].main == "Drizzle") {
      weatherIcon.src = "images/drizzle.png";
    } else if (data.weather[0].main == "Mist") {
      weatherIcon.src = "images/mist.png";
    }
  }
  checkWeather("Louhans");

});
