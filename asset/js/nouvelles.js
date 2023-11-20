// document.addEventListener('DOMContentLoaded', function () {
//     let newsContainer = document.getElementById('news-container');
//     let apiKey = '9750bfd9018d42779c7e75290f5c30d2';
//     let apiUrl = 'https://newsapi.org/v2/top-headlines?country=fr&apiKey=' + apiKey;

//     // Fais une requête à l'API
//     fetch(apiUrl)
//         .then(response => response.json())
//         .then(data => {
//             // Met à jour le contenu HTML avec les actualités
//             displayNews(data.articles.slice(0, 1)); // Afficher seulement les 5 premiers articles
//         })
//         .catch(error => console.error('Erreur lors de la récupération des actualités', error));

//     function displayNews(articles) {
//         let swiperWrapper = document.createElement('div');
//         swiperWrapper.classList.add('swiper-container');

//         let swiperSlide = document.createElement('div');
//         swiperSlide.classList.add('swiper-wrapper');

//         articles.forEach(article => {
//             let slideItem = document.createElement('div');
//             slideItem.classList.add('swiper-slide');

//             let newsItem = document.createElement('div');
//             newsItem.classList.add('card');

//             // Crée des éléments pour le titre, la description, etc.
//             let title = document.createElement('h2');
//             title.textContent = article.title;

//             let description = document.createElement('p');
//             description.textContent = article.description;

//             // Ajoute un gestionnaire d'événements pour afficher le contenu complet
//             description.addEventListener('click', function () {
//                 window.location.href = article.url;// Tu peux remplacer ceci par la logique d'affichage que tu veux
//             });

//             let source = document.createElement('p');
//             source.textContent = 'Source: ' + article.source.name;

//             // Ajoute les éléments au conteneur
//             newsItem.appendChild(title);
//             newsItem.appendChild(description);
//             newsItem.appendChild(source);

//             slideItem.appendChild(newsItem);
//             swiperSlide.appendChild(slideItem);
//         });

//         swiperWrapper.appendChild(swiperSlide);
//         newsContainer.appendChild(swiperWrapper);

       
//     }
// });
