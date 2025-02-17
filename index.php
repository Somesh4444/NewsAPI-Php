<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Portal</title>
    <!-- Semantic UI CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <style>
        html {
            scroll-behavior: smooth;
        }

        .sharp-card {
            border: 1px solid #ddd;
        }

        .sharp-img {
            height: 200px;
            object-fit: cover;
        }

        .banner {
            background-image: url(https://plus.unsplash.com/premium_photo-1707080369554-359143c6aa0b?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D);
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            height: 400px;
            text-align: center;
            margin-bottom: 20px;
        }

        .navbar {
            margin-bottom: 00px;
        }

        .ui.header {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <div class="ui menu navbar" style="margin-bottom: 0px; padding-left:20px; padding-right:20px">
        <h2 style="padding-top: 10px; padding-right:20px">News Portal</h2>
        <a class="item" href="#news">News</a>
        <a class="item" href="#about">About</a>
        <a class="item" href="#contact">Contact</a>
    </div>

    <!-- News Banner -->
    <div class="banner">
        <!-- <h3 class="ui header">Breaking News: Stay Updated with the Latest Headlines</h3> -->
    </div>

    <div class="ui container" id="news" style="margin-top: 50px;">
        <h1 class="ui header centered" style="margin-bottom:30px;">Breaking News: Stay Updated with the Latest Headlines
        </h1>

        <!-- Tab Navigation -->
        <div class="ui top attached tabular menu">
            <a class="item active" data-tab="business">Business News</a>
            <a class="item" data-tab="tesla">Tesla News</a>
            <a class="item" data-tab="techcrunch">TechCrunch</a>
            <a class="item" data-tab="wsj">Wall Street Journal</a>
            <a class="item" data-tab="apple">Apple News</a>
        </div>

        <!-- Tab Content -->
        <div class="ui bottom attached active tab segment" id="tab-business" data-tab="business">
            <?php
            // Function to fetch news from an API
            function fetch_news($url)
            {
                $curl = curl_init();
                curl_setopt_array($curl, [
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_SSL_VERIFYHOST => false,
                    CURLOPT_SSL_VERIFYPEER => false,
                    CURLOPT_HTTPHEADER => ["User-Agent: TabbedNewsApp/1.0"],
                ]);
                $response = curl_exec($curl);
                curl_close($curl);
                return json_decode($response);
            }

            // Business News API URL
            $business_api_url = "https://newsapi.org/v2/top-headlines?country=us&category=business&apiKey=da2de23398154d4a97a6b59fd0fdb758";
            $business_news = fetch_news($business_api_url);

            if ($business_news && $business_news->status === "ok") {
                echo '<div class="ui three stackable cards">';
                foreach (array_slice($business_news->articles, 0, 9) as $article) {
                    echo '<div class="card sharp-card">';
                    echo '<div class="image">';
                    echo '<img src="' . htmlspecialchars($article->urlToImage ?? 'https://via.placeholder.com/300x200?text=No+Image') . '" alt="News Image" class="sharp-img">';
                    echo '</div>';
                    echo '<div class="content">';
                    echo '<a href="' . htmlspecialchars($article->url) . '" class="header" target="_blank">' . htmlspecialchars($article->title) . '</a>';
                    echo '<div class="description">';
                    echo htmlspecialchars(substr($article->description ?? 'No description available.', 0, 100)) . '...';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
            } else {
                echo '<div class="ui message red"><div class="header">Error</div><p>Failed to fetch Business News.</p></div>';
            }
            ?>
        </div>

        <!-- Tesla News Tab -->
        <div class="ui bottom attached tab segment" id="tab-tesla" data-tab="tesla">
            <?php
            // Tesla News API URL
            $tesla_api_url = "https://newsapi.org/v2/everything?q=tesla&from=2024-12-23&sortBy=publishedAt&apiKey=da2de23398154d4a97a6b59fd0fdb758";
            $tesla_news = fetch_news($tesla_api_url);

            if ($tesla_news && $tesla_news->status === "ok") {
                echo '<div class="ui three stackable cards">';
                foreach (array_slice($tesla_news->articles, 0, 6) as $article) {
                    echo '<div class="card sharp-card">';
                    echo '<div class="image">';
                    echo '<img src="' . htmlspecialchars($article->urlToImage ?? 'https://via.placeholder.com/300x200?text=No+Image') . '" alt="News Image" class="sharp-img">';
                    echo '</div>';
                    echo '<div class="content">';
                    echo '<a href="' . htmlspecialchars($article->url) . '" class="header" target="_blank">' . htmlspecialchars($article->title) . '</a>';
                    echo '<div class="description">';
                    echo htmlspecialchars(substr($article->description ?? 'No description available.', 0, 100)) . '...';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
            } else {
                echo '<div class="ui message red"><div class="header">Error</div><p>Failed to fetch Tesla News.</p></div>';
            }
            ?>
        </div>

        <!-- TechCrunch News Tab -->
        <div class="ui bottom attached tab segment" id="tab-techcrunch" data-tab="techcrunch">
            <?php
            // TechCrunch News API URL
            $techcrunch_api_url = "https://newsapi.org/v2/top-headlines?sources=techcrunch&apiKey=da2de23398154d4a97a6b59fd0fdb758";
            $techcrunch_news = fetch_news($techcrunch_api_url);

            if ($techcrunch_news && $techcrunch_news->status === "ok") {
                echo '<div class="ui three stackable cards">';
                foreach (array_slice($techcrunch_news->articles, 0, 6) as $article) {
                    echo '<div class="card sharp-card">';
                    echo '<div class="image">';
                    echo '<img src="' . htmlspecialchars($article->urlToImage ?? 'https://via.placeholder.com/300x200?text=No+Image') . '" alt="News Image" class="sharp-img">';
                    echo '</div>';
                    echo '<div class="content">';
                    echo '<a href="' . htmlspecialchars($article->url) . '" class="header" target="_blank">' . htmlspecialchars($article->title) . '</a>';
                    echo '<div class="description">';
                    echo htmlspecialchars(substr($article->description ?? 'No description available.', 0, 100)) . '...';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
            } else {
                echo '<div class="ui message red"><div class="header">Error</div><p>Failed to fetch TechCrunch News.</p></div>';
            }
            ?>
        </div>

        <!-- Wall Street Journal News Tab -->
        <div class="ui bottom attached tab segment" id="tab-wsj" data-tab="wsj">
            <?php
            // Wall Street Journal API URL
            $wsj_api_url = "https://newsapi.org/v2/everything?domains=wsj.com&sortBy=publishedAt&apiKey=da2de23398154d4a97a6b59fd0fdb758";
            $wsj_news = fetch_news($wsj_api_url);

            if ($wsj_news && $wsj_news->status === "ok") {
                echo '<div class="ui three stackable cards">';
                foreach (array_slice($wsj_news->articles, 0, 6) as $article) {
                    echo '<div class="card sharp-card">';
                    echo '<div class="image">';
                    echo '<img src="' . htmlspecialchars($article->urlToImage ?? 'https://via.placeholder.com/300x200?text=No+Image') . '" alt="News Image" class="sharp-img">';
                    echo '</div>';
                    echo '<div class="content">';
                    echo '<a href="' . htmlspecialchars($article->url) . '" class="header" target="_blank">' . htmlspecialchars($article->title) . '</a>';
                    echo '<div class="description">';
                    echo htmlspecialchars(substr($article->description ?? 'No description available.', 0, 100)) . '...';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
            } else {
                echo '<div class="ui message red"><div class="header">Error</div><p>Failed to fetch Wall Street Journal News.</p></div>';
            }
            ?>
        </div>

        <!-- Apple News Tab -->
        <div class="ui bottom attached tab segment" id="tab-apple" data-tab="apple">
            <?php
            // Apple News API URL
            $apple_api_url = "https://newsapi.org/v2/everything?q=apple&from=2025-01-22&to=2025-01-22&sortBy=popularity&apiKey=da2de23398154d4a97a6b59fd0fdb758";
            $apple_news = fetch_news($apple_api_url);

            if ($apple_news && $apple_news->status === "ok") {
                echo '<div class="ui three stackable cards">';
                foreach (array_slice($apple_news->articles, 0, 6) as $article) {
                    echo '<div class="card sharp-card">';
                    echo '<div class="image">';
                    echo '<img src="' . htmlspecialchars($article->urlToImage ?? 'https://via.placeholder.com/300x200?text=No+Image') . '" alt="News Image" class="sharp-img">';
                    echo '</div>';
                    echo '<div class="content">';
                    echo '<a href="' . htmlspecialchars($article->url) . '" class="header" target="_blank">' . htmlspecialchars($article->title) . '</a>';
                    echo '<div class="description">';
                    echo htmlspecialchars(substr($article->description ?? 'No description available.', 0, 100)) . '...';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
            } else {
                echo '<div class="ui message red"><div class="header">Error</div><p>Failed to fetch Apple News.</p></div>';
            }
            ?>
        </div>

    </div>

    <!-- About  -->

    <!-- About Section -->
    <div class="ui" id="about" style="margin-top: 50px; background-color:#eee; padding-top:30px; padding-bottom:50px;">
        <h1 class="ui header centered">About Us</h1>
        <p class="ui text container">
            Welcome to our News portal. "Our news updates are fetched directly from News API, bringing you the
            latest headlines in real-time. From business and technology to global events, we aggregate the most relevant
            stories to keep you informed. Stay updated with news sourced from trusted APIs around the world, tailored to
            your interests.(This UI is in Semantic CSS Framework, Simple and sweet.)"
        </p>
    </div>


    <!-- Contact Section -->
    <div class="ui" id="contact"
        style="margin-top: 50px; background-color:#fff; padding-top:30px; padding-bottom:30px;">
        <h1 class="ui header centered">Contact Us</h1>

        <form class="ui form" style="max-width: 600px; margin: 0 auto;">
            <div class="field">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
            </div>

            <div class="field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="field">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="4" placeholder="Your message here" required></textarea>
            </div>

            <button type="submit" class="ui button primary">Submit</button>
        </form>

    </div>


    <!-- Footer Section -->
    <div class="ui" id="about"
        style="margin-top: 50px; background-color:#eee; padding-top:10px; padding-bottom:10px; text-align:center;">
        <p class="ui text container">
            &copy; <?= date('Y'); ?> News Portal. All Rights Reserved.
        </p>
    </div>


    <!-- Semantic UI and jQuery Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>

    <script>
        // Initialize Semantic UI Tab
        $(document).ready(function () {
            $('.menu .item').tab();
        });
    </script>
</body>

</html>