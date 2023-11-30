document.addEventListener('DOMContentLoaded', function () {
    let newsContainer = document.getElementById('news-container');
    let apiKey = '9750bfd9018d42779c7e75290f5c30d2';
    let apiUrl = 'https://newsapi.org/v2/top-headlines?country=fr&apiKey=' + apiKey;
    let googleNewsUrl = 'https://news.google.com/home?hl=fr&gl=FR&ceid=FR:fr';

    // Fais une requête à l'API
    fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            // Met à jour le contenu HTML avec la première actualité
            displayNews(data.articles[0]);
        })
        .catch(error => console.error('Erreur lors de la récupération des actualités', error));

    function displayNews(article) {
        let newsWrapper = document.createElement('div');
        newsWrapper.classList.add('news-wrapper');

        let newsItem = document.createElement('div');
        newsItem.classList.add('card');

        // Crée des éléments pour le titre, la description, etc.
        let title = document.createElement('h2');
        title.textContent = article.title;

        let description = document.createElement('p');
        description.textContent = article.description;

        let source = document.createElement('p');
        source.textContent = 'Source: ' + article.source.name;

        // Ajoute les éléments à la carte
        newsItem.appendChild(title);
        newsItem.appendChild(description);
        newsItem.appendChild(source);

        // Ajoute un gestionnaire d'événements clic à la carte
        newsItem.addEventListener('click', function () {
            window.open(googleNewsUrl, '_blank');
        });

        // Ajoute la carte au conteneur
        newsWrapper.appendChild(newsItem);

        // Ajoute le conteneur d'articles au conteneur principal
        newsContainer.innerHTML = '';
        newsContainer.appendChild(newsWrapper);
    }
});
