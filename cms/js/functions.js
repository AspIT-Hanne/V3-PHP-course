function findcity(cities)
{
    var postcodefield = document.querySelector("#postcode");
    var cityfield = document.querySelector("#city");

    for (key in cities)
    {
        if (cities[key][Postnr] == postcodefield.innerHTML)
        {
            cityfield.innerHTML = cities[key][Bynavn];
        }
    }
}