const gameCardsContainer2 = document.getElementById("game-cards-container");
const gameCards2 = gameCardsContainer2.querySelectorAll(".game-cards");

const sortedGameCards2 = Array.from(gameCards2).sort((a, b) => {
  const aGenre = a.querySelector(".genre").textContent.toLowerCase();
  const bGenre = b.querySelector(".genre").textContent.toLowerCase();
  return aGenre.localeCompare(bGenre);
});

sortedGameCards2.forEach((card) => {
  gameCardsContainer2.appendChild(card);
});