<!DOCTYPE html>
<html>
<head>
    <title>Array Pagination Example</title>
    <style>
        .pagination {
            margin-top: 10px;
        }
        .pagination a {
            padding: 5px;
            text-decoration: none;
            border: 1px solid #ccc;
            margin-right: 5px;
        }
        .pagination a.active {
            background-color: #ccc;
        }
    </style>
</head>
<body>

<?php
// Sample data array
$customArray = [
    ['title'=>"title 1"],
    ['title'=>"title 2"],
    ['title'=>"title 3"],
    ['title'=>"title 4"],
    ['title'=>"title 5"],
    ['title'=>"title 6"],
    ['title'=>"title 7"],
    ['title'=>"title 8"],
    ['title'=>"title 9"],
    ['title'=>"title 10"],
    ['title'=>"title 11"],
    ['title'=>"title 12"],
    ['title'=>"title 13"],
    ['title'=>"title 14"],
    ['title'=>"title 15"],
    ['title'=>"title 16"],
    ['title'=>"title 17"],
    ['title'=>"title 18"],
    ['title'=>"title 19"],
    ['title'=>"title 20"],
] ;
// Number of items per page
$itemsPerPage = 5;

// Current page number
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = intval($_GET['page']);
} else {
    $currentPage = 1;
}

// Calculate starting index for the current page
$startIndex = ($currentPage - 1) * $itemsPerPage;
echo var_dump($startIndex);

// Extract a slice of the array for the current page
$currentPageData = array_slice($customArray, $startIndex, $itemsPerPage);
?>

<h1>Array Pagination Example</h1>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($currentPageData as $index => $item): ?>
            <tr>
                <td><?php echo $startIndex + $index + 1; ?></td>
                <td><?php echo $item['title']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="pagination">
    <?php foreach (range(1, ceil(count($customArray) / $itemsPerPage)) as $i): ?>
        <a href="?page=<?php echo $i; ?>" <?php if ($i === $currentPage) echo 'class="active"'; ?>><?php echo $i; ?></a>
    <?php endforeach; ?>
</div>

</body>
</html>
