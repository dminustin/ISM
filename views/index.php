<html class="desktop" lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ISM</title>
</head>
<body>
<table style="width:100%">
    <tr style="vertical-align: top">
        <td style="width:20%">
            <select onchange="loadCustomerData()" id="customersList">
                <option value="">select customer</option>
                <?php
                foreach ($customers as $customer) {
                    echo '<option value="' . $customer['id'] . '">' . $customer['name'] . '</option>';
                }
                ?>
            </select>
        </td>
        <td style="width:80%" id="content"></td>
    </tr>
</table>
<script>
    async function fetchData(url, callback) {
        document.getElementById('content').innerHTML = 'Loading...';
        try {
            const response = await fetch(url);
            if (!response.ok) {
                throw new Error(response.statusText);
            }

            const data = await response.json();
            if ('function' === typeof callback) {
                callback(data);
            }


        } catch (error) {
            alert('ERROR: ' + error.message);
        }
    }

    function loadCustomerData() {
        const id = document.getElementById('customersList').value;
        fetchData('/index.php?page=balance&id=' + id, function (data) {
            let html = "<table><thead><tr><th>Month</th><th>Balance</th></thead><tbody>"
            for (let i in data.data) {
                html += "<tr><td>" + data.data[i].month + "</td><td>"
                    + "<td>" + data.data[i].monthly_balance + "</td></tr>"
            }
            html += "</tbody></table>"
            document.getElementById('content').innerHTML = html;
        })
    }
</script>
</body>