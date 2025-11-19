<?php
    require_once 'include/head.php';

?>
  <body class="min-vh-100 bg-light d-flex flex-column">
    
    <?php include 'include/header.php'; ?>

    <main class="container my-5 shadow-sm p-4 bg-white rounded flex-grow-1">
        <h2 class="mb-4">Indtast ny opskrift</h2>

        <form method="post" action="oprettetopskrift.php">
            <div class="mb-3 row">
                <label for="recipeName" class="col-form-label col-md-2">Opskriftens navn</label>
                <div class="col-md-4"><input type="text" class="form-control" id="recipeName" name="recipeName" required></div>
                <label for="recipeCategory" class="col-form-label col-md-3">Kategori</label>
                <div class="col-md-3">
                    <select name="recipeCategory" id="recipeCategory" class="form-select" required>
                        <option value="">Vælg kategori</option>
                        <option value="aftensmad">Aftensmad</option>
                        <option value="bagværk">Bagværk</option>
                        <option value="andet">Andet</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="recipeBy" class="col-form-label col-md-2">Oprettet af:</label>
                <div class="col-md-4"><input type="text" class="form-control" id="recipeBy" name="recipeBy" value="<?php if(isset($_SESSION['username'])) echo $_SESSION['username']; ?>" readonly></div>
                <label for="recipeDate" class="col-form-label col-md-3">Oprettet den:</label>
                <div class="col-md-3"><input type="text" class="form-control" id="recipeDate" name="recipeDate" value="<?php echo date('d-m-Y'); ?>" readonly></div>
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
                                <option value="minutter">Minutter</option>
                                <option value="timer">Timer</option>
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
                                <option value="minutter">Minutter</option>
                                <option value="timer">Timer</option>
                                <option value="dage">Dage</option>
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
                                <option value="C">Celsius</option>
                                <option value="F">Fahrenheit</option>
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
                                <option value="stk">Stk</option>
                                <option value="personer">Personer</option>
                                <option value="portioner">Portioner</option>
                                <option value="gram">Gram</option>
                                <option value="liter">Liter</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="recipeDesc" class="col-form-label col-md-2">Kort beskrivelse</label>
                <div class="col-md-10"><textarea class="form-control" id="recipeDesc" name="recipeDesc" rows="3" required></textarea></div>
            </div>
            <div class="mb-3 row" id="ingredientContainer">
                <label for="recipeIngredients" class="col-form-label col-md-2">Ingredienser</label>
                <div class="col-md-10 row pe-0">
                    <div class="col-2">
                        <input type="text" class="form-control" id="ingrAmount1" name="ingrAmount1" placeholder="Mængde" required>
                    </div>
                    <div class="col-2">
                        <select name="ingrUnit1" id="ingrUnit1" class="form-select" required>
                            
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
                    <div class="col-8 pe-0">
                        <input type="text" class="form-control" id="ingrName1" name="ingrName1" placeholder="Ingrediens" required>
                    </div>
                </div>
                
            </div>
            <div class="mb-3 row">
                <div class="col-md-10 offset-md-2">
                    <button type="button" class="btn btn-secondary btn-sm" id="addIngredientBtn">Tilføj ingrediens</button>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="recipeInstructions" class="col-form-label col-md-2">Fremgangsmåde</label>
                <div class="col-md-10"><textarea class="form-control" id="recipeInstructions" name="recipeInstructions" rows="10" required></textarea></div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-10 offset-md-2">
                    <input type="submit" class="btn bg-<?=$background;?> text-white" value="Opret" name="recipeSubmit">
                </div>
                
            </div>
                
        </form>
    </main>
    <script src="script.js"></script>
    <?php require_once 'include/footer.php'; ?>
  </body>
</html>