<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/JsBarcode.all.min.js"></script>
    <!--  Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<table class="table table-bordered">
    <thead>
    <th>Barcode</th>
    </thead>
    <tbody>
        <td><svg id="barcode"></svg></td>
    </tbody>
</table>
<svg id="barcode"></svg>

<script type="text/javascript">
    JsBarcode("#barcode", "1234567", {
  format: "codabar",
  lineColor: "#000",
  width: 4,
  height: 40,
  displayValue: true
});
</script>


</body>
</html>