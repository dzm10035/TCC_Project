<?php
// Start session to check if the user is logged in
session_start();
include 'connection.php';
// Check if the user is logged in
if (!isset($_SESSION['account_id'])) {
    header("Location: index.php"); // Redirect to login page if not logged in
    exit;
}

// Fetch product list from the database
$sql = "SELECT prod_id, prod_name, prod_description, prod_status, prod_quan FROM product";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center">Product List</h2>
        <button class="btn btn-success mb-3" data-toggle="modal" data-target="#addProductModal">Add Product</button>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Product Description</th>
                    <th>Product Status</th>
                    <th>Product Quantity</th>
                    <th>Edit</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if there are products and display them
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row['prod_id']) . "</td>
                                <td>" . htmlspecialchars($row['prod_name']) . "</td>
                                <td>" . htmlspecialchars($row['prod_description']) . "</td>
                                <td>" . htmlspecialchars($row['prod_status']) . "</td>
                                <td>" . htmlspecialchars($row['prod_quan']) . "</td>
                                <td>
                                    <button class='btn btn-warning btn-sm' data-toggle='modal' data-target='#editProductModal' 
                                        data-id='" . htmlspecialchars($row['prod_id']) . "' 
                                        data-name='" . htmlspecialchars($row['prod_name']) . "' 
                                        data-description='" . htmlspecialchars($row['prod_description']) . "' 
                                        data-status='" . htmlspecialchars($row['prod_status']) . "' 
                                        data-quan='" . htmlspecialchars($row['prod_quan']) . "'>Edit</button>
                                </td>
                                 <td>
                                    <button class='btn btn-danger btn-sm delete-btn' data-prod-id='" . htmlspecialchars($row['prod_id']) . "' data-toggle='modal' data-target='#deleteModal'>Delete</button>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>No products found</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Edit Product Modal -->
        <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editProductForm"  method="POST">
                            <input type="hidden" name="prod_id" id="prod_id">
                            <div class="mb-3">
                                <label for="prod_name" class="form-label">Product Name</label>
                                <input type="text" name="prod_name" class="form-control" id="prod_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="prod_description" class="form-label">Product Description</label>
                                <textarea name="prod_description" class="form-control" id="prod_description" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="prod_status" class="form-label">Product Status</label>
                                <select name="prod_status" class="form-select" id="prod_status" required>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="prod_quan" class="form-label">Product Quantity</label>
                                <input type="number" name="prod_quan" class="form-control" id="prod_quan" min="0" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

         <!-- Add Product Modal -->
        <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="addProductForm"  method="POST">
                            <div class="mb-3">
                                <label for="prod_name" class="form-label">Product Name</label>
                                <input type="text" name="prod_name" class="form-control" id="prod_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="prod_description" class="form-label">Product Description</label>
                                <textarea name="prod_description" class="form-control" id="prod_description" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="prod_status" class="form-label">Product Status</label>
                                <select name="prod_status" class="form-select" id="prod_status" required>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="prod_quan" class="form-label">Product Quantity</label>
                                <input type="number" name="prod_quan" class="form-control" id="prod_quan" min="0" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this product?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                    </div>
                </div>
            </div>
        </div>

        

        <a href="handle_logout.php" class="btn btn-danger">Logout</a>
    </div>

    <script>
    $(document).ready(function() {
        // Populate the modal with product data
        $('#editProductModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var prodId = button.data('id');
            var prodName = button.data('name');
            var prodDescription = button.data('description');
            var prodStatus = button.data('status');
            var prodQuan = button.data('quan');

            // Update the modal's content.
            var modal = $(this);
            modal.find('#prod_id').val(prodId);
            modal.find('#prod_name').val(prodName);
            modal.find('#prod_description').val(prodDescription);
            modal.find('#prod_status').val(prodStatus);
            modal.find('#prod_quan').val(prodQuan);
        });

        // Handle form submission via AJAX
        $('#editProductForm').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission
            $.ajax({
                type: 'POST',
                url: 'update_product.php', // Separate file for handling updates
                data: $(this).serialize(),
                success: function(response) {
                    alert(response); // Display response from server
                    location.reload(); // Reload the page to see changes
                },
                error: function() {
                    alert('Error updating product');
                }
            });
        });

        // AJAX for adding product
        $('#addProductForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            $.ajax({
                type: 'POST',
                url: 'add_product.php', // URL to the PHP file that handles adding products
                data: $(this).serialize(),
                success: function(response) {
                    alert(response); // Show success message
                    $('#addProductModal').modal('hide'); // Hide the modal
                    location.reload(); // Reload the page to see the new product
                },
                error: function() {
                    alert('Error adding product.');
                }
            });
        });

        // Handle delete button click
        let productIdToDelete;
        $('.delete-btn').on('click', function() {
            productIdToDelete = $(this).data('prod-id'); // Get the product ID
        });

        // Confirm delete action
        $('#confirmDelete').on('click', function() {
            $.ajax({
                type: 'POST',
                url: 'delete_product.php', // URL to the PHP file that handles deleting products
                data: { prod_id: productIdToDelete },
                success: function(response) {
                    alert(response); // Show success message
                    $('#deleteModal').modal('hide'); // Hide the modal
                    location.reload(); // Reload the page to see the updated product list
                },
                error: function() {
                    alert('Error deleting product.');
                }
            });
        });
    });
    </script>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
