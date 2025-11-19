// Opret en tæller til at navngive nye ingrediensfelter unikt
// Da vores første sæt felter allerede har nummer 1, starter vi tælleren der og så tæller vi den op,
// inden vi tilføjer et nyt sæt felter (optællingen sker første gang i linje 14).
let ingrIndex = 1;

// Hent knappen "Tilføj ingrediens" over i JavaScript og læg den i variablen addIngrButton
// Tilføj en event listener til knappen, der kalder funktionen addIngredientField, når der klikkes på knappen
let addIngrButton = document.querySelector('#addIngredientBtn');
addIngrButton.addEventListener('click', addIngredientField);

// Funktion til at tilføje et nyt sæt ingrediensfelter
function addIngredientField() {
    // Tæl tælleren en op, så hvert nyt sæt felter får et unikt nummer
    ingrIndex++;
    // Hent div'en med id'et "ingredientContainer", for det er her, vi skal tilføje de nye felter
    const ingredientContainer = document.querySelector('#ingredientContainer');
    // Opret en ny div til det nye sæt ingrediensfelter
    const newIngredientDiv = document.createElement('div');
    // Tilføj de nødvendige klasser til den nye div
    newIngredientDiv.classList.add('col-md-10', 'row', 'pe-0');
    // Tilføj HTML-indholdet til den nye div med unikke id'er og navne baseret på tælleren
    // ingrAmount${ingrIndex} bliver til ingrAmount2, ingrAmount3 osv., når vores tæller bliver talt en op i linje 14
    // Det samme sker med ingrUnit${ingrIndex} og ingrName${ingrIndex}
    newIngredientDiv.innerHTML = `
        <div class="col-2"></div>
        <div class="col-2">
            <input type="text" class="form-control" id="ingrAmount${ingrIndex}" name="ingrAmount${ingrIndex}" placeholder="Mængde" required>
        </div>
        <div class="col-2">
            <select name="ingrUnit${ingrIndex}" id="ingrUnit${ingrIndex}" class="form-select" required>

                <option value="g">gram</option>
                <option value="kg">kilo</option>
                <option value="ml">milliliter</option>
                <option value="dl">deciliter</option>
                <option value="liter">liter</option>
                <option value="knivspids">knivspids</option>
                <option value="stk">stk</option>
                <option value="tsk">teskefuld</option>
                <option value="spsk">spiseskefuld</option>
            </select>
        </div>
        <div class="col-6 pe-0">
            <input type="text" class="form-control" id="ingrName${ingrIndex}" name="ingrName${ingrIndex}" placeholder="Ingrediens" required>
        </div>`;
    // Tilføj den nye div, som vi oprettede i linje 18, med ingrediensfelter til containeren
    ingredientContainer.appendChild(newIngredientDiv);
}