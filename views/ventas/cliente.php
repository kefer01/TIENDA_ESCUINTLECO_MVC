<?php
    if ($cliente == null) {
        echo json_encode([null]);
    }else {
        echo json_encode(['data' => $cliente]);
    }
?>