<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin | Add Product/s</title>


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <link rel="stylesheet" href="css/addproduct.css">

    </head>
    <body>

        <div class="container">

            <div class="admin-product-form-container">

                <form action="#" method="post" enctype="multipart/form-data">
                    <h3>Add a New Product</h3>
                    <input type="text" placeholder="Enter product name" name="product_name" class="box">
                    <input type="text" placeholder="Enter product description" name="product_description" class="box">
                    <input type="text" placeholder="Enter dosage" name="product_dosage" class="box">
                    <input type="text" placeholder="Enter dosage form" name="product_dosageform" class="box">
                    <input type="number" placeholder="Enter product price" name="product_price" class="box">
                    <input type="number" placeholder="Enter product quantity" name="product_quantity" class="box">
                    <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
                    <input type="submit" class="btn" name="add_product" value="Add Product">
                </form>

            </div>

            <div class="product-display">
                <table class="product-display-table">
                    <thead>
                        <tr>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th> Description </th>
                            <th> Dosage </th>
                            <th> Dosage form </th>
                            <th>Product Price</th>
                            <th> Quantity </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tr>
                        <td><img src="uploaded_img/product_image.jpg" height="100" alt="Product Image"></td>
                        <td>Product Name</td>
                        <td> Description </td>
                        <td> Dosage </td>
                        <td> Form </td>
                        <td>100php</td>
                        <td> 5 </td>
                        <td>
                            <a href="#" class="btn"> <i class="fas fa-edit"></i> Edit </a>
                            <a href="#" class="btn"> <i class="fas fa-trash"></i> Delete </a>
                        </td>
                    </tr>
                </table>
            </div>

        </div>
    </body>
</html>
