const currentAmountInput = document.querySelector('input[name="currentAmount"]');
const originalAmount = document.querySelector('#recipeAmount');
let originalIngredientAmounts = new Array();
let ingredientAmounts = document.querySelectorAll('.ingredients ul li');

ingredientAmounts.forEach((ingredient, index) => {
    originalIngredientAmounts[index] = parseFloat(ingredient.firstElementChild.value);
});

console.dir(originalIngredientAmounts)

currentAmountInput.addEventListener('input', () => {
    let newAmount = parseFloat(currentAmountInput.value);

    let relativeChange = newAmount / parseFloat(originalAmount.textContent);

    ingredientAmounts.forEach((ingredient, index) => {
        console.dir("original " + originalIngredientAmounts[index]);
        if(parseInt(originalIngredientAmounts[index] * relativeChange) === (originalIngredientAmounts[index] * relativeChange))
            ingredient.firstElementChild.value = (parseFloat(originalIngredientAmounts[index]) * relativeChange).toFixed(0);
        else
            ingredient.firstElementChild.value = (parseFloat(originalIngredientAmounts[index]) * relativeChange).toFixed(1);
    });
    
});

