<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="HandheldFriendly" content="true">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/custom/randompicker/style.css">

    <title>Random Winner</title>
</head>

<body>
    <main class="page-wrapper">
        <div class="container">
            <h1>Who's The Winner?!</h1>
            <div class="add-c">
                <div class="name-c">
                    <label for="">Kategori</label>
                    <input type="text" id="name" placeholder="Insert player's name one by one" />
                </div>
                <input class="button" type="submit" value="Add Name" onclick="add()" />
            </div>
            <div class="draw-c">
                <input class="button" type="submit" value="Draw" onclick="draw()" />
            </div>
            <div class="clear-c">
                <input class="button" type="submit" value="Clear All" onclick="clearAll()" />
            </div>
            <div id="print">
                <div id="name-list"></div>
                <div id="result"></div>
            </div>
        </div>
        <footer>
            <p>© YAMAHA DAY 11 OKTOBER 2024 YEMI & YMPI.</p>
        </footer>
    </main>

    <!-- MY WEBSITE -->
    <script>
        let names = [];

        function add() {
            let name = document.getElementById("name").value;

            function capitalize(str) {
                return (
                    str
                    .toLowerCase()
                    .split(" ")
                    // Return all words inside a string with capitalized first letter
                    .map(function(word) {
                        return word[0].toUpperCase() + word.substr(1);
                    })
                    .join(" ")
                );
            }

            names.push(" " + capitalize(name));
            // Empty input every time button is clicked
            name.value = "";
            for (i = 0; i < names.length; i++) {
                document.getElementById(
                    "name-list"
                ).innerHTML = `The players are ${names}.`;
            }
            // Empty the input field every time button is clicked
            document.getElementById("name").value = "";
        }

        function draw() {
            let index = Math.floor(Math.random() * names.length);
            let winner = names[index].toUpperCase();
            document.getElementById("result").innerHTML = `And the winner is ${winner}!`;
        }

        function clearAll() {
            names.length = 0;
            document.getElementById("name").value = "";
            document.getElementById("name-list").innerHTML = "";
            document.getElementById("result").innerHTML = "";
        }
    </script>

</body>

</html>