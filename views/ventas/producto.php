<?php
    if ($producto == null) {
        echo json_encode([null]);
    }else {
        echo json_encode(['data' => $producto]);
    }
?>