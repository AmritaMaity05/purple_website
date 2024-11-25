<?php
include 'include/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Text-Book</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="styles/categories_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/categories_responsive.css">
    <style>
        .flipbook-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
            padding: 20px;
        }
        .flipbookkk {
            width: 48%;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 15px;
            background-color: #f9f9f9;
        }
        .flipbookkk-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        #searchInput {
            width: 100%;
            padding: 10px;
            margin: 20px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        #results {
            margin: 20px 0;
        }
        #results div {
            margin: 10px 0;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="super_container">
        <!-- Navbar Start -->
        <?php include 'include/navbar.php'; ?>
        <div class="fs_menu_overlay"></div>
        <!-- Search Section -->
        <div class="container">
            <h1 class="text-center mt-4">Textbooks</h1>
            <input type="text" id="searchInput" placeholder="Search for books" oninput="searchBooks()">
            <div id="results"></div>
            <div id="iframeContainer" style="display:none;">
                <iframe id="bookPreviewIframe" width="100%" height="480" frameborder="0" allowfullscreen></iframe>
            </div>
            <!-- Flipbook Layout -->
            <div class="flipbook-container">
                <div class="flipbookkk">
                    <h3 class="flipbookkk-title">Denotation & Connotation</h3>
                    <iframe src="https://cdn.flipsnack.com/widget/v2/widget.html?hash=fu56p2gym" width="100%" height="480" seamless="seamless" scrolling="no" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="flipbookkk">
                    <h3 class="flipbookkk-title">Compositions & Narratives</h3>
                    <iframe src="https://cdn.flipsnack.com/widget/v2/widget.html?hash=fxcj4pmko" width="100%" height="480" seamless="seamless" scrolling="no" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="flipbookkk">
                    <h3 class="flipbookkk-title">Patterns & Types (Fonts)</h3>
                    <iframe src="https://cdn.flipsnack.com/widget/v2/widget.html?hash=ft95r3fmz" width="100%" height="480" seamless="seamless" scrolling="no" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>
    <script src="plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
    <script src="js/categories_custom.js"></script>
    <script>
        function searchBooks() {
            const query = document.getElementById('searchInput').value;
            const resultsDiv = document.getElementById('results');
            const iframeContainer = document.getElementById('iframeContainer');
            const bookPreviewIframe = document.getElementById('bookPreviewIframe');

            resultsDiv.innerHTML = ''; // Clear previous results
            iframeContainer.style.display = 'none';

            if (query.length > 2) {
                const apiURL = `https://www.googleapis.com/books/v1/volumes?q=${query}`;
                fetch(apiURL)
                    .then(response => response.json())
                    .then(data => {
                        if (data.items) {
                            data.items.forEach(book => {
                                const bookInfo = book.volumeInfo;
                                const div = document.createElement('div');
                                div.innerHTML = `<strong>${bookInfo.title}</strong> by ${bookInfo.authors ? bookInfo.authors.join(', ') : 'Unknown Author'}`;
                                div.onclick = () => {
                                    iframeContainer.style.display = 'block';
                                    bookPreviewIframe.src = book.accessInfo.webReaderLink || '';
                                };
                                resultsDiv.appendChild(div);
                            });
                        } else {
                            resultsDiv.innerHTML = '<p>No books found.</p>';
                        }
                    })
                    .catch(err => {
                        console.error('Error fetching books:', err);
                        resultsDiv.innerHTML = '<p>Error loading books.</p>';
                    });
            }
        }
    </script>

    <?php include 'include/footer.php'; ?>
</body>
</html>
