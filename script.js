function dateFunction()
{
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();

    if (dd < 10) {
    dd = '0' + dd;
    }

    if (mm < 10) {
    mm = '0' + mm;
    } 
        
    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("datefield").setAttribute("min", today);
}

document.addEventListener("DOMContentLoaded", function() 
{
    var getTableData = document.getElementById("getTableData");
    var tableContainer = document.getElementById("tableContainer");
    var tableVisible = false;

    getTableData.addEventListener("click", function() 
    {
        if (!tableVisible) 
        {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "getTableData.php", true);

            xhr.onreadystatechange = function() 
            {
                if (xhr.readyState === 4 && xhr.status === 200) 
                {
                    var data = JSON.parse(xhr.responseText);

                    var html = "<table class='table-content'><tr><th>Ime</th><th>Prezime</th><th>Broj ljudi</th><th>Datum</th><th>Vrijeme</th></tr>";
                    for (var i = 0; i < data.length; i++) 
                    {
                        html += "<tr><td>" + data[i].ime + "</td><td>" + data[i].prezime + "</td><td>" + data[i].brojLjudi + "</td><td>" + data[i].datum + "</td><td>" + data[i].vrijeme + "</td></tr>";
                    }
                    html += "</table>";
                    tableContainer.innerHTML = html;

                    tableContainer.style.display = "block";
                    tableVisible = true;
                }
            };
            xhr.send();
        }
        else 
        {
            tableContainer.style.display = "none";
            tableVisible = false;
        }
    });
});

