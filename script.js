function adminSignIn() {

    var mail = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {


            if (request.responseText == "Success") {

                window.location = "dashboard.php";

            } else {

                alert(request.responseText);

            }
        } else {

            alert("Something Went Wrong");
        }
    }

    request.open("GET", "adminSignInProcess.php?email=" + mail + "&password=" + password, true);
    request.send();
}

// modalHandler.js
$(document).ready(function () {
    $('#exampleModalCenter').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var name = button.data('name'); // Extract info from data-* attributes
        var position = button.data('position');
        var status = button.data('status');
        var date = button.data('date');
        var email = button.data('email');

        var modal = $(this);
        modal.find('#modalName').text(name);
        modal.find('#modalPosition').text(position);
        modal.find('#modalStatus').text(status);
        modal.find('#modalDate').text(date);
        modal.find('#modalEmail').text(email);
    });
});


function moreDetails() {

    var email = document.getElementById('modalEmail').textContent;
    alert(email);

}


$(document).ready(function () {
    $('#searchBUTTON').click(function () {

        event.preventDefault();
        // Call your search function or perform any other action here
        searchEMP();

    })
});

function searchEMP() {

    var searchData = document.getElementById('empName').value;

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {



            document.getElementById('allEmployees').innerHTML = request.responseText;


        }else {
            
            alert("Something Went Wrong");
        }
    }

    request.open("GET", "SerachEmployee.php?data=" + searchData, true);
    request.send();



}


$(document).ready(function () {
    $('#cusSearch').click(function () {

        event.preventDefault();
        // Call your search function or perform any other action here
        searchEMP2();

    })
});

function searchEMP2() {

    var searchData = document.getElementById('CusName').value;

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {



            document.getElementById('allCustomers').innerHTML = request.responseText;


        }else {
            
            alert("Something Went Wrong");
        }
    }

    request.open("GET", "SerachCutomer.php?data=" + searchData, true);
    request.send();



}



function previewImage(event, imgId) {

    const input = event.target;

    const reader = new FileReader();

    reader.onload = function () {
        const dataURL = reader.result;
        const img = document.getElementById(imgId);
        img.src = dataURL;

    };

    reader.readAsDataURL(input.files[0]);
}


document.addEventListener('DOMContentLoaded', function () {
    const textarea = document.getElementById('desc');
    const wordCountDisplay = document.getElementById('wordCount');

    textarea.addEventListener('input', function () {
        // Get the current value of the textarea
        const text = this.value;

        // Split the text into words by whitespace
        const words = text.trim().split(/\s+/);

        // Display the current word count
        const wordCount = words.length;
        wordCountDisplay.textContent = wordCount;

        // Limit the textarea to 100 words
        if (wordCount > 100) {
            // Trim the excess words
            const trimmedText = words.slice(0, 100).join(' ');
            this.value = trimmedText;
            wordCountDisplay.textContent = 100; // Update word count display
        }
    });
});

//document.getElementById('upload1').addEventListener('change', function (event) {
//const file = event.target.files[0]; // Get the first selected file (assuming single file selection)

//if (file) {
// const reader = new FileReader();

// reader.onload = function () {
//    const dataURL = reader.result;
//   console.log('Uploaded file data URL:', dataURL);

// You can use dataURL to display or process the uploaded file data
//};

//reader.readAsDataURL(file); // Read the file as a data URL
// }
//});




function getProductDetails() {
    // Get form data
    const name = document.getElementById('name').value;
    const code = document.getElementById('code').value;
    const category = document.getElementById('category').value;
    const brand = document.getElementById('brand').value;
    const price = document.getElementById('price').value;
    const discount = document.getElementById('discount').value;
    const qty = document.getElementById('qty').value;
    const desc = document.getElementById('desc').value;
    const size = document.getElementById('size').value;
    const colour = document.getElementById('colour').value;

    // if (isNaN(price) || price <= 0) {
    //     alert("Invalid Price");
    // } else {
    //     alert("Price is valid");
    //     // Further logic can be added here
    // }

    console.log(name + " " + code + " " + category + " " + brand + " " + price + " " + discount + " " + qty + " " + desc + " " + size + " " + colour);

    // Create FormData object
    const formData = new FormData();
    formData.append('name', name);
    formData.append('code', code);
    formData.append('category', category);
    formData.append('brand', brand);
    formData.append('price', price);
    formData.append('discount', discount);
    formData.append('qty', qty);
    formData.append('desc', desc);
    formData.append('size', size);
    formData.append('colour', colour);

    // Add uploaded files
    const img1Input = document.getElementById('upload1');
    const img2Input = document.getElementById('upload2');
    const img3Input = document.getElementById('upload3');

    if (img1Input.files.length > 0) {
        formData.append('img1', img1Input.files[0]);
    }
    if (img2Input.files.length > 0) {
        formData.append('img2', img2Input.files[0]);
    }
    if (img3Input.files.length > 0) {
        formData.append('img3', img3Input.files[0]);
    }

    // Send formData via XMLHttpRequest
    const request = new XMLHttpRequest();
    const url = 'uploadProduct.php';

    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            if (request.status === 200) {

                if (request.responseText == "Success") {

                    anime1();

                } else {

                    alert(request.responseText);

                }
                //console.log(request.responseText);
                // Handle success response

            } else {
                alert("Error uploading product. Please try again later.");
                // Handle error condition
            }
        }
    };

    request.open('POST', url, true);
    request.send(formData);
}


function sixeChecker() {

    var cat = document.getElementById("category").value;

    if (cat == '1' || cat == '2') {

        document.getElementById('size').disabled = false;

    } else {
        document.getElementById('size').disabled = true;
    }


}

function anime1() {


    document.getElementById("successAnime").classList.remove('d-none');
    document.getElementById("detailsSection").classList.add('d-none');

    setTimeout(function () {
        location.reload();
    }, 3000);

}


function anime2() {


    document.getElementById("successAnime2").classList.remove('d-none');
    document.getElementById("detailsSection2").classList.add('d-none');

    setTimeout(function () {
        location.reload();
    }, 3000);

}

function productAdminSearch() {

    const empName = document.getElementById("empName").value;

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            if (request.responseText == "Invalid Search") {

                alert(request.responseText);
                window.location.reload();

            } else if (request.readyState == "Unknown Error Occured") {

                alert(request.responseText);
                window.location.reload();

            } else {
                document.getElementById("detailsSerachProduction").innerHTML = request.responseText;
            }

        }
    }

    request.open("GET", "productSearch.php?name=" + empName, true);
    request.send();

}


function updateProduct(pId) {
    // Get form data

    const productId = pId;
    const name = document.getElementById('name').value;
    const price = document.getElementById('price').value;
    const discount = document.getElementById('discount').value;
    const qty = document.getElementById('qty').value;
    const desc = document.getElementById('desc').value;

    // Create FormData object
    const formData = new FormData();
    formData.append('name', name);
    formData.append('pId', productId);
    formData.append('price', price);
    formData.append('discount', discount);
    formData.append('qty', qty);
    formData.append('desc', desc);

    // // Add uploaded files
    // const img1Input = document.getElementById('upload1');
    // const img2Input = document.getElementById('upload2');
    // const img3Input = document.getElementById('upload3');

    // if (img1Input.files.length > 0) {
    //     formData.append('img1', img1Input.files[0]);
    // }
    // if (img2Input.files.length > 0) {
    //     formData.append('img2', img2Input.files[0]);
    // }
    // if (img3Input.files.length > 0) {
    //     formData.append('img3', img3Input.files[0]);
    // }

    // Send formData via XMLHttpRequest
    const request = new XMLHttpRequest();
    const url = 'UpdateProductProcess.php';

    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            if (request.status === 200) {

                if (request.responseText == "Success") {

                    anime2();

                } else {

                    alert(request.responseText);

                }
                //console.log(request.responseText);
                // Handle success response

            } else {
                alert("Error uploading product. Please try again later.");
                // Handle error condition
            }
        }
    };

    request.open('POST', url, true);
    request.send(formData);
}


function deactivateProduct(id, statusId) {

    var pId = id;
    var status_Id = statusId;

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            if (request.responseText == "Success") {

                anime2();

            } else {

                alert(request.responseText);

            }

        }
    }

    request.open("GET", "changeProductStatus.php?pId=" + pId + "&statusId=" + status_Id, true);
    request.send();


}



// $(document).ready(function () {
//     $('#searchBUTTON').click(function (event) {
//         event.preventDefault();
//         // Call your search function or perform any other action here
//         searchEMP();
//     });
// });


$(document).ready(function () {
    $('#searchOrderButton').on('click', function () {

        event.preventDefault();
        const date = $('#orderDate').val();

        var request = new XMLHttpRequest();

        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {

                if (request.responseText == "Unknow Error Occured") {

                    alert(request.responseText);

                } else {

                    document.getElementById('tBody').innerHTML = request.responseText;

                }

            }
        }

        request.open("GET", "searchOrder.php?search=" + date, true);
        request.send();


    });
});


// Function to trigger file chooser dialog
function chooseFile() {
    document.getElementById("fileInput").click();
}

function handleFile(files) {
    // Get the first selected file (assuming single file selection)
    var selectedFile = files[0];

    // Check if a file was selected
    if (selectedFile) {
        // Get the file extension
        var fileExtension = selectedFile.name.split('.').pop().toLowerCase();

        // Allowed image extensions
        var allowedExtensions = ['jpg', 'jpeg', 'png', 'gif']; // Add more if needed

        // Check if the file extension is in the list of allowed extensions
        if (allowedExtensions.includes(fileExtension)) {
            // Create a FileReader object to read file data
            var reader = new FileReader();

            // Set up FileReader onload event handler
            reader.onload = function (event) {
                // Update the src attribute of the profile image with the selected file data
                document.getElementById("profileImage").src = event.target.result;
            };

            // Read the selected file as a data URL (base64 encoded)
            reader.readAsDataURL(selectedFile);
        } else {
            // Display an error message or handle invalid file extension
            alert("Invalid file format. Please select a JPG, PNG, or GIF file.");
        }
    }
}

function AdminProfileImage() {

    const imageInput = document.getElementById("fileInput");


    if (imageInput.files.length > 0) {
        // Get the selected file
        const selectedFile = imageInput.files[0];

        // Create a FormData object
        const formData = new FormData();
        formData.append('image', selectedFile);

        const request = new XMLHttpRequest();

        request.onreadystatechange = function () {
            if (request.readyState === 4 && request.status === 200) {


                if (request.responseText == "Success") {

                    alert("Update Successfully")
                    window.location.reload();

                } else {

                    alert(request.responseText);

                }

            }
        };

        request.open('POST', 'adminDataUpdate.php', true);
        request.send(formData);

    } else {
        alert('Please select an image file to upload.');
    }
}


$(document).ready(function () {
    $('#updateAdminDetails').click(function () {

        event.preventDefault();

        const firstName = $('#First_name').val();
        const lastName = $('#LastName').val();
        const mobile = $('#Mobile').val();


        // Create FormData object
        const formData = new FormData();
        formData.append('firstName', firstName);
        formData.append('lastName', lastName);
        formData.append('mobile', mobile);

        const request = new XMLHttpRequest();


        request.onreadystatechange = function () {
            if (request.readyState === 4 && request.status === 200) {

                var response = request.responseText;

                if (response == "Success") {

                    window.location.reload();

                } else {

                    alert(response);
                }

            }
        };

        request.open('POST', 'updateAdminPrivateDetails.php', true);
        request.send(formData);

    })
});

function logOut() {

    // Create a new XMLHttpRequest object
    var request = new XMLHttpRequest();

    // Define the function to handle the response when ready
    request.onreadystatechange = function () {
        // Check if the request is complete and successful
        if (request.readyState == 4 && request.status == 200) {
            // Check the response from the server
            if (request.responseText == "Success") {
                // If the response indicates success, reload the page
                window.location.reload();
            }
        }
    };

    // Open a GET request to 'signOut.php' asynchronously
    request.open("GET", "adminSignOut.php", true);

    // Send the request
    request.send();

}


$(document).ready(function () {
    $('#serachOrderId').click(function () {

        event.preventDefault();

        const Id = $('#deliverId').val();

        const request = new XMLHttpRequest();


        request.onreadystatechange = function () {
            if (request.readyState === 4 && request.status === 200) {

                var response = request.responseText;

                document.getElementById("result").innerHTML = response;



            }
        };

        request.open('GET', "orderstatusChange.php?id=" + Id, true);
        request.send();


    })
});


function changeOrderStatus(id) {

    const OrderId = id;
    const statusValue = document.getElementById('statusOrder').value;

    var form = new FormData();

    form.append('OrderId', OrderId);
    form.append('statusValue', statusValue);

    const request = new XMLHttpRequest();


    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {

            var response = request.responseText;
            if (response == "Success") {

                alert("Delivery Status Change Successfully");
            } else {
                alert(response);
            }


        }
    };

    request.open('POST', 'orderDelStatus.php', true);
    request.send(form);

}


$(document).ready(function () {
    $('#AddCatBtn').click(function () {

        event.preventDefault();

        const catName = $('#AddCat').val();

        const request = new XMLHttpRequest();


        request.onreadystatechange = function () {
            if (request.readyState === 4 && request.status === 200) {

                var response = request.responseText;

                if (response == "Success") {

                    window.location.reload();

                } else {

                    alert(request.responseText);
                }


            }
        };

        request.open('GET', "productDataChange.php?name=" + catName, true);
        request.send();


    })
});

$(document).ready(function () {
    $('#AddBrandBtn').click(function () {

        event.preventDefault();

        const catName = $('#AddBrand').val();

        const request = new XMLHttpRequest();


        request.onreadystatechange = function () {
            if (request.readyState === 4 && request.status === 200) {

                var response = request.responseText;

                if (response == "Success") {

                    window.location.reload();

                } else {

                    alert(request.responseText);
                }


            }
        };

        request.open('GET', "productDataChange.php?nameBra=" + catName, true);
        request.send();


    })
});

$(document).ready(function () {
    $('#AddColourBtn').click(function () {

        event.preventDefault();

        const catName = $('#AddColour').val();

        const request = new XMLHttpRequest();


        request.onreadystatechange = function () {
            if (request.readyState === 4 && request.status === 200) {

                var response = request.responseText;

                if (response == "Success") {

                    window.location.reload();

                } else {

                    alert(request.responseText);
                }


            }
        };

        request.open('GET', "productDataChange.php?nameCol=" + catName, true);
        request.send();


    })
});

$(document).ready(function () {
    $('#AddPositionBtn').click(function () {

        event.preventDefault();

        const catName = $('#AddPosition').val();

        const request = new XMLHttpRequest();


        request.onreadystatechange = function () {
            if (request.readyState === 4 && request.status === 200) {

                var response = request.responseText;

                if (response == "Success") {

                    window.location.reload();

                } else {

                    alert(request.responseText);
                }


            }
        };

        request.open('GET', "productDataChange.php?namePos=" + catName, true);
        request.send();


    })
});

$(document).ready(function () {
    $('#userForAdminSearchBUTTON').click(function () {

        event.preventDefault();

        const email = $('#userForAdmin_email').val();

        const request = new XMLHttpRequest();


        request.onreadystatechange = function () {
            if (request.readyState === 4 && request.status === 200) {

                var response = request.responseText;

                // console.log(response);

                if (response == "Enter Email First") {

                    alert(request.responseText);

                } else if (response == "Invalid Email") {

                    alert(request.responseText);

                } else {

                    // $('#beforeAddAdmin_Check').html = response;
                    document.getElementById("beforeAddAdmin_Check").innerHTML = response;

                }




            }
        };

        request.open('GET', "serachUserForAdmin.php?email=" + email, true);
        request.send();


    })
});


$(document).ready(function () {
    $('#updatAddEmpDataeAdminDetails').click(function () {

        event.preventDefault();

        const Email = $('#adminAddEmail').val();
        const position = $('#posAdmin').val();
        const status = $('#adminStatus').val();

        // alert(Email + " " + position + " " + status);


        // Create FormData object
        const formData = new FormData();
        formData.append('Email', Email);
        formData.append('position', position);
        formData.append('status', status);

        const request = new XMLHttpRequest();


        request.onreadystatechange = function () {
            if (request.readyState === 4 && request.status === 200) {

                var response = request.responseText;

                if (response == "Success") {
                    alert("Employee Register or Update SuccessFull");
                    window.location.reload();
                } else {
                    alert(response);
                }


            }
        };

        request.open('POST', 'addemployee.php', true);
        request.send(formData);

    })
});

function deactiVateCus(email) {

    // var email = document.getElementById('modalEmail').textContent;

    const request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {

            var response = request.responseText;

            if (response == "Success") {

                alert("Status Change Successfully");
                window.location.reload();

            } else {

                alert(response);

            }
        }
    };

    request.open('GET', "customerStatusChange.php?email=" + email, true);
    request.send();

}