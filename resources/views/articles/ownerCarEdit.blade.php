<!DOCTYPE html>
<html>
    <head>
        <style>
            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #333;
            }

            li {
                float: left;
            }

            li a {
                display: block;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }

            li a:hover {
                background-color: #111;
            }

            .selected {
                background-color: rgb(165, 214, 238);
            }

            button{
                padding: 8px 15px;
                border: none;
                border-radius: 4px;
                background: #451cda;
                font-weight: bold;
                color: white;
            }
            button:hover{
                background-color:#745dc7; 
            }

            #selectedID_area{
                display:flex;
                align-items: center;
            }
            #selectedID_area button{
                padding: 8px 15px;
                height: auto; 
            }
            #selectedID{
                padding-right: 10px;
            }

            #carsTable {
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
                margin-bottom: 10px;
            }

            #carsTable td, #carsTable th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #carsTable th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #098cc4;
                color: white;
            }

            #CarsOfUserTable {
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
                margin-bottom: 10px;
            }

            #CarsOfUserTable td, #CarsOfUserTable th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #CarsOfUserTable th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #451cda;
                color: white;
            }
        </style>
    </head>
    <body>
        <ul>
            <li><a href="/articles/cars">Cars</a></li>
            <li><a href="/articles/users">Users</a></li>
        </ul>

        <h1>Own Cars Edit</h1>

        <table id="carsTable">
            <tr>
                <th>ID</th>
                <th>Model</th>
                <th>Make</th>
                <th>Price</th>
                <th>Year</th>
            </tr>
            <tr data-id="1">
                <td>1</td>
                <td>Revuelto</td>
                <td>Lamborghini</td>
                <td>$2000000</td>
                <td>2024</td>
            </tr>
            <tr data-id="2">
                <td>2</td>
                <td>Roma</td>
                <td>Ferrari</td>
                <td>$1000000</td>
                <td>2020</td>
            </tr>
        </table>

        <div id="selectedID_area" style="visibility: hidden;">
            <h3 id="selectedID">Selected Car ID:  </h3>
            <button id="cancel_btn"  onclick="cancel()">Cancel</button>
        </div>

        <div id="btns_area" style="visibility: hidden;">
            <button id="delete_btn">Delete</button>
        </div>

        <script>
            const table = document.getElementById("carsTable");
            const selectedID_area = document.getElementById("selectedID_area");
            const selectedItemText = document.getElementById("selectedID");
            const cancelBtn = document.getElementById("cancel_btn");
            const btns_area = document.getElementById("btns_area");

            const delete_btn = document.getElementById("delete_btn");

            const ownerID = @json($ownerID);

            const cancel = () => {
                document.querySelectorAll("tr.selected").forEach(row => row.classList.remove("selected"));
                selectedID_area.style.visibility = 'hidden';
                btns_area.style.visibility = 'hidden';
                belongCars.style.display = 'none';
            }

            table.addEventListener("click", (event) => {
                const clickedRow = event.target.closest("tr");
                if (!clickedRow || !clickedRow.hasAttribute("data-id")) return;

                document.querySelectorAll("tr.selected").forEach(row => row.classList.remove("selected"));
                cancelBtn.style.display = 'block';
                selectedID_area.style.visibility = 'visible';
                btns_area.style.visibility = 'visible';

                clickedRow.classList.add("selected");
                const selectedID = clickedRow.getAttribute("data-id");

                delete_btn.onclick = function() {
                    window.location.href = `/articles/users/${ownerID}/ownCar/edit/delete/${selectedID}`;
                }

                selectedItemText.textContent = `Selected Car ID: ${selectedID}`;
            });
        </script>
    </body>
</html>

