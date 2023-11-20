let selectedSatisfaction = '';

function recordSatisfaction(satisfaction) {
    selectedSatisfaction = satisfaction;
    updateSelectedSatisfaction();
}

function updateSelectedSatisfaction() {
    const selectedSatisfactionElement = document.getElementById('selected-satisfaction');
    selectedSatisfactionElement.innerHTML = `Vous êtes ${selectedSatisfaction} !`;
}