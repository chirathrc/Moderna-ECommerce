<?php

session_start();
include "connection.php";

if ($_SESSION['u']) {

    if (!empty($_GET['name'])) {

        $productCode = $_GET['name'];

        $productdata = Database::search("SELECT *, 
        `product_image2`.`image` AS `subImage` 
        FROM `product` 
        INNER JOIN `product_image_main` ON `product`.`P_id` = `product_image_main`.`Product_P_id`
        INNER JOIN `product_image2` ON `product`.`P_id` = `product_image2`.`Product_P_id`
        INNER JOIN `product_images` ON `product`.`P_id` = `product_images`.`Product_P_id`
        INNER JOIN `category` ON `product`.`Category_Cat_id` = `category`.`Cat_id`
        INNER JOIN `brand` ON `product`.`Brand_B_id` = `brand`.`B_id`
        INNER JOIN `status` ON `product`.`status_id` = `status`.`id`
        INNER JOIN `size_clothing` ON `product`.`Size_Clothing_size_id` = `size_clothing`.`size_id`
        WHERE `uniq_code` = '" . $productCode . "'");


        if ($productdata->num_rows == 1) {

            $productdataResultset = $productdata->fetch_assoc();

            $productColour = Database::search("SELECT * FROM `product_has_colours` 
            INNER JOIN `colours` ON `product_has_colours`.`colours_colour_id` = `colours`.`colour_id`
            WHERE `product_has_colours`.`Product_P_id` = '" . $productdataResultset['P_id'] . "'");

            $productColourData = $productColour->fetch_assoc();


            ?>

            <div class="col-md-6 col-12">

                <h1 class="text-center">Search Product</h1>
                <hr>

                <div class="row mb-5 input-container">
                    <form class="form-inline  ">
                        <input class="form-control mr-sm-4" type="search" placeholder="Search" aria-label="Search" id="empName">
                        <button class="btn my-2 my-sm-0" onclick="productAdminSearch()" id="searchBUTTON">
                            <i class="fa fa-search text-dark"></i>
                        </button>

                    </form>
                </div>


                <div class="input-container">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" value="<?php echo ($productdataResultset['Title']) ?>" class="form-control" id="name"
                        placeholder="Enter product Name" required>
                </div>


                <div class="input-container">
                    <label for="exampleInput" class="form-label">Product Code (<span
                            class="text-danger"><?php echo ($productdataResultset['status']) ?></span>)</label>
                    <input type="text" value="<?php echo ($productdataResultset['uniq_code']) ?>" class="form-control"
                        id="exampleInput" placeholder="dR423" required disabled>
                </div>

                <div class="input-container">
                    <label for="category" class="form-label">Product Category</label>
                    <input type="text" value="<?php echo ($productdataResultset['name']) ?>" class="form-control" id="category"
                        placeholder="Product Category" required disabled>
                </div>

                <div class="input-container">
                    <label for="category" class="form-label">Product Brand</label>
                    <input type="text" value="<?php echo ($productdataResultset['Brand_Name']) ?>" class="form-control"
                        id="category" placeholder="Product Brand" required disabled>
                </div>


                <div class="input-container">
                    <label for="price" class="form-label">Price(Rs.)</label>
                    <input type="text" value="<?php echo ($productdataResultset['Price']) ?>" class="form-control" id="price"
                        placeholder="Enter Price">
                </div>

                <div class="input-container">
                    <label for="exampleInput" class="form-label">Size</label>
                    <input type="text" value="<?php echo ($productdataResultset['size']) ?>" class="form-control" id="exampleInput"
                        placeholder="Enter Price" disabled>
                </div>




                <style>
                    .input-container {
                        max-width: 400px;
                        /* Adjust the max width as needed */
                        margin: 20px auto;
                        /* Center the container */
                    }

                    .image-upload-container {
                        position: relative;
                        width: 100px;
                        height: 100px;
                        margin: 10px;
                    }

                    .image-upload-container img {
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                        cursor: pointer;
                    }

                    .image-upload-container input[type="file"] {
                        display: none;
                    }

                    .image-upload-label {
                        display: inline-block;
                        width: 100%;
                        height: 100%;
                        cursor: pointer;
                    }
                </style>




            </div>

            <div class="col-md-6 col-12 ">

                <div class="row d-flex justify-content-center">
                    <div class="d-flex flex-wrap justify-content-center">
                        <div class="image-upload-container">
                            <label for="upload1" class="image-upload-label">
                                <img src="Shop/<?php echo ($productdataResultset['images']) ?>" id="img1" alt="Gallery Image">
                            </label>
                        </div>
                        <div class="image-upload-container">
                            <label for="upload2" class="image-upload-label">
                                <img src="Shop/<?php echo ($productdataResultset['image']) ?>" id="img2" class="img-fluid"
                                    alt="Gallery Image">
                            </label>
                        </div>
                        <div class="image-upload-container">
                            <label for="upload3" class="image-upload-label">
                                <img src="Shop/<?php echo ($productdataResultset['subImage']) ?>" id="img3"
                                    class="img-fluid" alt="Gallery Image">
                            </label>
                        </div>
                    </div>


                    <style>
                        .d-flex {
                            display: flex;
                            flex-wrap: wrap;
                            justify-content: center;
                        }

                        .image-upload-container {
                            width: 200px;
                            /* Set width of each container */
                            height: 200px;
                            /* Set height of each container */
                            margin: 10px;
                            /* Adjust margin as per your design */
                            text-align: center;
                            /* Center align contents */
                            overflow: hidden;
                            /* Hide overflow to ensure images don't overflow */
                            border: 1px solid #ddd;
                            /* Optional: Add border for better separation */
                        }

                        .image-upload-label {
                            display: block;
                            width: 100%;
                            /* Ensure label covers the entire container */
                            height: 100%;
                            /* Ensure label covers the entire container */
                            cursor: pointer;
                            /* Show pointer cursor on hover */
                        }

                        .image-upload-label img {
                            max-width: 100%;
                            /* Ensure images do not exceed the width of their container */
                            max-height: 100%;
                            /* Ensure images do not exceed the height of their container */
                            height: auto;
                            /* Maintain aspect ratio */
                            display: block;
                            /* Prevent extra space below inline images */
                            margin: 0 auto;
                            /* Center the image horizontally */
                        }
                    </style>


                </div>

                <div class="input-container">
                    <label for="discount" class="form-label">Discount (Optional)</label>
                    <input type="number" value="<?php echo ($productdataResultset['Discount']) ?>" class="form-control"
                        id="discount" placeholder="5%">
                </div>
                <div class="input-container">
                    <label for="qty" class="form-label">Product qty</label>
                    <input type="number" value="<?php echo ($productdataResultset['qty']) ?>" class="form-control" id="qty"
                        placeholder="0">
                </div>

                <div class="input-container">
                    <label for="desc" class="form-label">Product Description (100 Words)</label>
                    <Textarea id="desc" class="form-control" rows="8"
                        required><?php echo ($productdataResultset['Description']) ?></Textarea>
                    <small class="word-count"><span id="wordCount">0</span> words</small>
                </div>

                <div class="input-container">
                    <label for="category" class="form-label">Product Colour</label>
                    <input type="text" value="<?php echo ($productColourData['colour']) ?>" class="form-control" id="category"
                        placeholder="Product Colour" required disabled>
                </div>

                <div class="row d-flex justify-content-center mt-4">
                    <div class="col-6">
                        <button class="form-control btn btn-success"
                            onclick="updateProduct(<?php echo ($productdataResultset['P_id']) ?>);">Update</button>
                    </div>
                    <div class="col-6">

                        <button class="form-control btn btn-success"
                            onclick="deactivateProduct(<?php echo $productdataResultset['P_id']; ?>, <?php echo $productdataResultset['status_id']; ?>)">
                            <?php
                            if ($productdataResultset['status_id'] == '1') {
                                echo 'Deactivate';
                            } elseif ($productdataResultset['status_id'] == '2') {
                                echo 'Activate';
                            }
                            ?>
                        </button>

                    </div>

                </div>



            </div>


            <?php


        } else {
            echo ("Invalid Search");
        }

    } else {

        echo ("Invalid Search");
    }



} else {

    echo ("Unknown Error Occured");
}

?>