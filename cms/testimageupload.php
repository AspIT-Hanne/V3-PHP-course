<pre><?php  
            if ($_SERVER["REQUEST_METHOD"] == "POST") 
            {
                print_r($_FILES);
            } 
            
            ?></pre>

<form method="post" enctype="multipart/form-data">


    <p>
        <label for="newproduct-name">Produkt navn: </label>
        <input type="text" name="newproduct-name" placeholder="Produktnavn">
    </p>

    <p>
        <label for="newproduct-image">Klik for at uploade produkt billede</label>
        <!-- name="newproduct-image[]" indicates that multiple uploads are allowed and stored in array -->
        <input type="file" name="newproduct-image[]" multiple>
        <p>ctrl + klik for at markere og uploade flere billeder.</p>
    </p>
    <p>
        <input type="submit" name="newproduct-submit" value="Opret" class="submitbtn">
    </p>

</form>