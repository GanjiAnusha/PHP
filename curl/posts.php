<?php
include("session.php");
if (!isset($_SESSION['accessToken'])) {
    header("Location: auth.php");
}
// function fetchPosts()
// {
$ch = curl_init('https://dummyjson.com/products');

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: application/json'
]);

$response = curl_exec($ch);
curl_close($ch);
$products = json_decode($response, true) ?? [];
// exit(print_r($products));
// if (count($products) > 0)
// {
//     foreach ($products['products'] as $post)
//     {
//         // echo "<pre>";
//         // echo $post['id']."--".$post['title'] . " - " . $post['body'] . "<br>". print_r($post['tags']);
//         // exit();
//     }
// }
// else
// {
//     echo "No posts found.";
// }
// }
// fetchPosts();



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
    <?php
    if (count($products) > 0) {
        foreach ($products['products'] as $product) {
            ?>
            <div class="card bg-base-100 w-96 shadow-sm">
                <figure>
                    <img src="<?= $product['thumbnail'] ?>" alt="Shoes" />
                </figure>
                <div class="card-body">

                    <h2><b>Price: </b><del><?= $product['price'] ?></del></h2>
                    <h2><b>Discount Percentage: </b><i><?= $product['discountPercentage'] ?></i></h2>
                    <h2><b>Discounted price:
                        </b><?php $discount = ($product['price'] * $product['discountPercentage']) / 100;
                        echo $product['price'] - $discount ?>
                    </h2>
                    <?php
                    $rating = round($product['rating']);
                    ?>

                    <h2><b>Rating: </b>
                        <?php
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $rating) {
                                echo '<span class="text-yellow-400">&#9733;</span>'; // Filled star
                            } else {
                                echo '<span class="text-gray-400">&#9734;</span>'; // Empty star
                            }
                        }
                        ?>
                    </h2>
                    <h2 class="card-title"><?= $product['title'] ?></h2>
                    <p><?= $product['description'] ?></p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary" onclick="window.location.href='posting.php';">Buy Now</button>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo "No posts found.";
    } ?>


</body>

</html>