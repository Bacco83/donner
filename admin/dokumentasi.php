<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Documentation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        .image-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .image-item {
            width: calc(33.33% - 10px);
            margin-bottom: 20px;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .image-item img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 8px 8px 0 0;
        }

        .image-caption {
            padding: 10px;
            background-color: #eee;
            text-align: center;
            border-radius: 0 0 8px 8px;
        }
    </style>
</head>

<body>
    <header>
        <h1>Image Documentation</h1>
    </header>

    <div class="container">
        <h2>Gallery</h2>
        <div class="image-container">
            <div class="image-item">
                <img src="../img/download (7).jpg" alt="Image 1">
                <div class="image-caption">Sembako</div>
            </div>
            <div class="image-item">
                <img src="../img/OIP (6).jpg" alt="Image 2">
                <div class="image-caption">Image 2</div>
            </div>
            <div class="image-item">
                <img src="../img/OIP (7).jpg" alt="Image 3">
                <div class="image-caption">Image 3</div>
            </div>
            <!-- Add more image items as needed -->
        </div>
    </div>
</body>

</html>
