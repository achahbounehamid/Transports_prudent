// Clé API pour OpenWeatherMap
const apiKey = "51ce942ff61d9f82281c4b75aae585ef";

// URL de l'API OpenWeatherMap pour obtenir les informations météorologiques
const apiUrl = "https://api.openweathermap.org/data/2.5/weather?units=metric&q=";

// Attend que le contenu de la page HTML soit complètement chargé
document.addEventListener("DOMContentLoaded", () => {
  // Récupère les éléments du DOM nécessaires
  const searchBox = document.querySelector(".search input");
  const searchBtn = document.querySelector(".search button");
  const weatherIcon = document.querySelector(".weather-icon");

  // Vérifie si les éléments nécessaires sont présents
  if (searchBox && searchBtn && weatherIcon) {
    // Ajoute un écouteur d'événements au bouton de recherche
    searchBtn.addEventListener("click", () => {
      // Appelle la fonction checkWeather avec la valeur de la boîte de recherche
      checkWeather(searchBox.value);
    });
  } else {
    // Affiche une erreur si l'un des éléments n'est pas trouvé
    console.error("One or more elements not found.");
  }

  // Fonction asynchrone pour vérifier la météo
  async function checkWeather(city) { 
    // Effectue une requête à l'API OpenWeatherMap pour obtenir les données météorologiques
    const response = await fetch(apiUrl + city + `&appid=${apiKey}`);
    
    // Convertit la réponse en JSON
    let data = await response.json();

    // Met à jour les éléments HTML avec les données météorologiques
    document.querySelector(".city").innerHTML = data.name.replace("Arrondissement de", "");
    document.querySelector(".temp").innerHTML = Math.round(data.main.temp) + "°C";
    document.querySelector(".humidity").innerHTML = data.main.humidity + "%";
    document.querySelector(".wind").innerHTML = data.wind.speed + " km/h";

    // Met à jour l'icône météorologique en fonction du type de temps
    if (data.weather[0].main == "Clouds") { 
      // Aucune mise à jour nécessaire pour le moment nuageux
    } else if (data.weather[0].main == "Clear") {
      // Météo dégagée
      console.log("Weather is Clear");
      weatherIcon.src = "images/clear.png";
    } else if (data.weather[0].main == "Drizzle") {
      // Bruine
      weatherIcon.src = "images/drizzle.png";
    } else if (data.weather[0].main == "Mist") {
      // Brume
      weatherIcon.src = "images/mist.png";
    } else {
      // Mise à jour par défaut pour d'autres conditions météorologiques
      weatherIcon.src = "images/clear.png";
    }
  }

  // Appelle initialement la fonction checkWeather avec la ville "Louhans"
  checkWeather("Louhans");
});
