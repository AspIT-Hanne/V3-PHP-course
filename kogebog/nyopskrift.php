<?php
    require_once 'include/head.php';

?>
  <body class="min-vh-100 bg-light">
    <?php include 'include/header.php'; ?>

    <main class="container my-5 shadow-sm p-4 bg-white rounded">
        <h2 class="mb-4">Indtast ny opskrift</h2>

        <form>
            <div class="mb-3 row">
                <label for="recipeName" class="col-form-label col-md-2">Opskriftens navn</label>
                <div class="col-md-4"><input type="text" class="form-control" id="recipeName" name="recipeName" required></div>
                <label for="recipeCategory" class="col-form-label col-md-3">Kategori</label>
                <div class="col-md-3">
                    <select name="recipeCategory" id="recipeCategory" class="form-select" required>
                        <option value="">Vælg kategori</option>
                        <option value="forretter">Aftensmad</option>
                        <option value="hovedretter">Bagværk</option>
                        <option value="desserter">Andet</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="recipeBy" class="col-form-label col-md-2">Oprettet af:</label>
                <div class="col-md-4"><input type="text" class="form-control" id="recipeBy" name="recipeBy" value="Bruger" disabled></div>
                <label for="recipeDate" class="col-form-label col-md-3">Oprettet den:</label>
                <div class="col-md-3"><input type="text" class="form-control" id="recipeDate" name="recipeDate" value="<?php echo date('d-m-Y'); ?>" disabled></div>
            </div>
            <div class="mb-3 row">
                <label for="recipePrepTime" class="col-form-label col-md-2">Forberedelsestid</label>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-6">
                            <input type="number" class="form-control" id="recipePrepTime" name="recipePrepTime">
                        </div>
                        <div class="col-6">
                            <select name="recipePrepTimeUnit" id="recipePrepTimeUnit" class="form-select">
                                <option value="minutes">Minutter</option>
                                <option value="hours">Timer</option>
                            </select>
                        </div>
                    </div>
                </div>
                <label for="recipeCookTime" class="col-form-label col-md-3">Tilberedningstid (inkl. hævetid)</label>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-6">
                            <input type="number" class="form-control" id="recipeCookTime" name="recipeCookTime">
                        </div>
                        <div class="col-6">
                            <select name="recipeCookTimeUnit" id="recipeCookTimeUnit" class="form-select">
                                <option value="minutes">Minutter</option>
                                <option value="hours">Timer</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="recipeTemp" class="col-form-label col-md-2">Temperatur</label>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-6">
                            <input type="text" class="form-control" id="recipeTemp" name="recipeTemp">
                        </div>
                        <div class="col-6">
                            <select name="recipeTempUnit" id="recipeTempUnit" class="form-select">
                                <option value="celsius">Celsius</option>
                                <option value="fahrenheit">Fahrenheit</option>
                            </select>
                        </div>
                    </div>
                </div>
                <label for="recipeAmount" class="col-form-label col-md-3">Mængde/Antal</label>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-6">
                            <input type="number" class="form-control" id="recipeAmount" name="recipeAmount">
                        </div>
                        <div class="col-6">
                            <select name="recipeAmountUnit" id="recipeAmountUnit" class="form-select">
                                <option value="pieces">Stk</option>
                                <option value="persons">Personer</option>
                                <option value="portions">Portioner</option>
                                <option value="grams">Gram</option>
                                <option value="liters">Liter</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="recipeDesc" class="col-form-label col-md-2">Kort beskrivelse</label>
                <div class="col-md-10"><textarea class="form-control" id="recipeDesc" name="recipeDesc" rows="3" required></textarea></div>
            </div>
            <div class="mb-3 row">
                <label for="recipeIngredients" class="col-form-label col-md-2">Ingredienser</label>
                <div class="col-md-10"><textarea class="form-control" id="recipeIngredients" name="recipeIngredients" rows="10" required></textarea></div>
            </div>
            <div class="mb-3 row">
                <label for="recipeInstructions" class="col-form-label col-md-2">Fremgangsmåde</label>
                <div class="col-md-10"><textarea class="form-control" id="recipeInstructions" name="recipeInstructions" rows="10" required></textarea></div>
            </div>
            <button type="submit" class="btn bg-success text-white">Opret</button>
        </form>
    </main>
    <?php require_once 'include/footer.php'; ?>
  </body>
</html>