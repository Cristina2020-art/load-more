<table>
    <thead>
        <tr>
            <th>Number</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
        </tr>
    </thead>

    <tbody id="data"></tbody>
</table>

<button type="button" onclick="getData();">
    Load More
</button>

<script type="text/javascript">
    var start = 0;
    var limit = 10;

    function getData() {
        var ajax = new XMLHttpRequest();
        ajax.open("GET", "Http.php?start=" + start + "&limit=" + limit, true);
        ajax.send();

        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                
                var data = JSON.parse(this.responseText);
                var html = "";

                for (var a = 0; a < data.length; a++) {
                    html += "<tr>";
                        html += "<td>" + data[a].employeeNumber + "</td>";
                        html += "<td>" + data[a].firstName + "</td>";
                        html += "<td>" + data[a].lastName + "</td>";
                        html += "<td>" + data[a].email + "</td>";
                    html += "</tr>";
                }

                document.getElementById("data").innerHTML += html;
                start = start + limit;
            }
        };
    }

    getData();
</script>