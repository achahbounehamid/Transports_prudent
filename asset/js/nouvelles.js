document.addEventListener('DOMContentLoaded', function () {
    let newsContainer = document.getElementById('news-container');
    let apiKey = '9750bfd9018d42779c7e75290f5c30d2';
    let apiUrl = 'https://newsapi.org/v2/top-headlines?country=fr&apiKey=' + apiKey;

    // Fais une requête à l'API
    fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            // Met à jour le contenu HTML avec les actualités
            displayNews(data.articles); // Afficher toutes les actualités
        })
        .catch(error => console.error('Erreur lors de la récupération des actualités', error));

    function displayNews(articles) {
        let currentIndex = 0;

        function showNews(startIndex) {
            let newsWrapper = document.createElement('div');
            newsWrapper.classList.add('news-wrapper');
        
            // Affiche trois articles à la fois
            for (let i = startIndex; i < startIndex + 4 && i < articles.length; i++) {
                let article = articles[i];
                let newsItem = document.createElement('div');
                newsItem.classList.add('card');
        
                // Crée des éléments pour le titre, la description, etc.
                let title = document.createElement('h2');
                title.textContent = article.title;
        
                let description = document.createElement('p');
                description.textContent = article.description;
        
                let source = document.createElement('p');
                source.textContent = 'Source: ' + article.source.name;
        
                // Ajoute les éléments au conteneur
                newsItem.appendChild(title);
                newsItem.appendChild(description);
                newsItem.appendChild(source);
        
                newsWrapper.appendChild(newsItem);
            }
        
            // Ajoute le conteneur d'articles au conteneur principal
            newsContainer.innerHTML = '';
            newsContainer.appendChild(newsWrapper);
        }
        

        // Affiche le premier article
        showNews(currentIndex);

        // Gestion des boutons de navigation
        document.getElementById('prev-btn').addEventListener('click', function () {
            if (currentIndex > 0) {
                currentIndex--;
                showNews(currentIndex);
            }
        });

        document.getElementById('next-btn').addEventListener('click', function () {
            if (currentIndex < articles.length - 1) {
                currentIndex++;
                showNews(currentIndex);
            }
        });
    }
});
