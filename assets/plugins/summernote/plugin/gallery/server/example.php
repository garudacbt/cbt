<?php

$page = isset($_GET['page']) && $_GET['page'] ? intval($_GET['page']) : 1;
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]";

$response = [
    'data' => [],
    'links' => []
];

for ($i=1; $i <= 10 ; $i++) {

    /* Enable the loop for only existent pictures*/
    // do {
        $pic_id = rand(1, 1000);
        $pic_link = "https://picsum.photos/id/$pic_id/200/200";
    // } while (! @file_get_contents($pic_link ));

    $response['data'][] = [
        "src" => $pic_link,
        "title" => "Pic $pic_id"
    ];
}

if ($page <= 12) {
    $response['links']['next'] = $url.'?page='.++$page;
} else {
    $response['links']['next'] = null;
}

header('Content-Type: application/json');

echo json_encode($response);
