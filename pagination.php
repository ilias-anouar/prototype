<?php
$pageId;

if (isset($_GET['pageId'])) {
    $pageId = $_GET['pageId'];
} else {
    $pageId = 1;
}

$endIndex = $pageId * 6;
$StartIndex = $endIndex - 6;

$sql = ("SELECT * FROM `books` LIMIT 8 OFFSET $StartIndex");

$page = 'SELECT * FROM books';

$books_lentgh = $conn->query($page)->rowCount();

$pagesNum = 0;

if (($books_lentgh % 8) == 0) {

    $pagesNum = $books_lentgh / 8;
} else {
    $pagesNum = ceil($books_lentgh / 8);
}

$books = $conn->query($sql);
$books = $books->fetchAll(PDO::FETCH_ASSOC);
?>
<?php if ($_SERVER["REQUEST_METHOD"] == "GET") { ?>
    <nav class="mt-5 mb-5 " aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php for ($i = 1; $i <= $pagesNum; $i++) { ?>
                <li class="page-item"><a class="page-link" href="<?php echo "books.php?pageId=" . $i ?>"><?php echo $i; ?></a>
                </li>
            <?php } ?>
        </ul>
    </nav>
<?php }