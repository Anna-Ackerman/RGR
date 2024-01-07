<?php
include_once "../config/dbconnect.php";

if (isset($_POST['category_id']) && isset($_POST['name'])) {
    $category_id = $_POST['category_id'];
    $category_name = $_POST['name'];

    $stmt = $conn->prepare("UPDATE categories SET name=? WHERE id=?");
    $stmt->bind_param("si", $category_name, $category_id);

    if ($stmt->execute()) {
        echo "Category updated successfully.";
    } else {
        echo "Error updating category: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid parameters.";
}
?>
