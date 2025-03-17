function reg() {

    var FN = document.getElementById("FirstName").value;
    var Ln = document.getElementById("LastName").value;
    var mail = document.getElementById("CustomerEmail").value;
    var password = document.getElementById("CustomerPassword").value;
    var ConPassword = document.getElementById("ConfirmPassword").value;
    document.getElementById("regBTN").disabled = true;

    document.getElementById("FirstName").disabled = true;
    document.getElementById("LastName").disabled = true;
    document.getElementById("CustomerEmail").disabled = true;
    document.getElementById("CustomerPassword").disabled = true;
    document.getElementById("ConfirmPassword").disabled = true;


    var Form = new FormData();
    Form.append("FN", FN);
    Form.append("LN", Ln);
    Form.append("mail", mail);
    Form.append("p1", password);
    Form.append("p2", ConPassword);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            if (request.responseText == "Success") {

                alert("Ok");

                document.getElementById("row1").classList.add("d-none");
                document.getElementById("row2").classList.add("d-none");

                document.getElementById("otp1").classList.remove("d-none");
                document.getElementById("otp2").classList.remove("d-none");

            } else {
                alert(request.responseText);

                document.getElementById("FirstName").disabled = false;
                document.getElementById("LastName").disabled = false;
                document.getElementById("CustomerEmail").disabled = false;
                document.getElementById("CustomerPassword").disabled = false;
                document.getElementById("ConfirmPassword").disabled = false;
                document.getElementById("regBTN").disabled = false;
            }

        }
    }

    request.open("POST", "requestREG.php", true);
    request.send(Form);

}


function registerVerify() {

    var OTP = document.getElementById("OTP").value;

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            if (request.responseText == "Success") {

                alert("Success");

                window.location = "login.php";

            } else if (request.responseText == "Invalid OTP") {

                alert("Invalid OTP");
            } else {

                alert(request.responseText);
                window.location.reload();

            }



        }
    }

    request.open("GET", "RegisterVerify.php?otp=" + OTP, true);
    request.send();

}

function SignIN() {
    var mail = document.getElementById("CustomerEmail").value;
    var ps = document.getElementById("CustomerPassword").value;

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            if (request.responseText == "Success") {

                alert("Ok");
                window.location = "index.php";

            } else {
                alert(request.responseText);
            }

        }
    }


    request.open("GET", "SignIn.php?m=" + mail + "&p=" + ps, true);
    request.send();
}


function Personaldetails() {

    var fn = document.getElementById("first-name").value;
    var ln = document.getElementById("last-name").value;
    var mobile = document.getElementById("mobile").value;

    var form = new FormData();
    form.append("fn", fn);
    form.append("ln", ln);
    form.append("mobile", mobile);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            if (request.responseText == "OK") {

                window.location.reload();
            } else {
                alert(request.responseText);
            }

        }
    }

    request.open("POST", "UpdatePersonalProfile.php", true);
    request.send(form);


}

function updatePassword() {

    const currentPW = document.getElementById("current-pwd").value;
    const newPW = document.getElementById("new-pwd").value;
    const confirmNewPW = document.getElementById("confirm-pwd").value;

    var form = new FormData();
    form.append("currentPW", currentPW);
    form.append("newPW", newPW);
    form.append("confirmNewPW", confirmNewPW);


    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            if (request.responseText == "Ok") {

                alert("Password Update SuccessFull");
                window.location.reload();
            } else {
                alert(request.responseText);
            }

        }
    }

    request.open("POST", "UpdatePassword.php", true);
    request.send(form);


}


function details() {

    var pro = document.getElementById("pro").value;
    var dis = document.getElementById("dis").value;
    var city = document.getElementById("city").value;
    var ad1 = document.getElementById("ad1").value;
    var ad2 = document.getElementById("ad2").value;


    var form = new FormData();
    form.append("pro", pro);
    form.append("dis", dis);
    form.append("city", city);
    form.append("ad1", ad1);
    form.append("ad2", ad2);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            if (request.responseText == "OK") {

                window.location.reload();
            } else {
                alert(request.responseText);
            }

        }
    }

    request.open("POST", "UpdateProfile.php", true);
    request.send(form);
}


var color_id = 0;
function cl(color, id) {
    document.getElementById("product_cl").innerHTML = color;
    color_id = id;

}


//single product page qty
function decreaseQuantity() {
    var quantityInput = document.getElementById('quantityInput');
    var currentValue = parseInt(quantityInput.value);
    // Check if the current value is greater than 1
    if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
        quantityChanged();
    }
}

function increaseQuantity(max) {
    var quantityInput = document.getElementById('quantityInput');
    var currentValue = parseInt(quantityInput.value);
    var maxValue = parseInt(max);

    if (currentValue == maxValue) {
        alert("Max Qty Reached");
    } else {
        // Increment the value regardless of maximum limit
        quantityInput.value = currentValue + 1;
        quantityChanged();
    }
}

var qty = 1
function quantityChanged() {
    var quantityInput = document.getElementById('quantityInput');
    qty = quantityInput.value;
}
//END single product page qty







function cart(id) {

    var Pid = id;
    var color = document.getElementById("product_cl").textContent;

    var form = new FormData();
    form.append("cl_id", color_id);
    form.append("P_id", Pid);
    form.append("qty", qty);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            if (request.status == 200) {
                var response = request.responseText;

                if (response == "Sucess") {

                    window.location.reload();

                } else if (response == "Sign In") {

                    window.location = "login.php"; // Redirect to login page

                } else {

                    alert("An error occurred: " + response);

                }
            } else {
                alert("An error occurred while processing your request.");
            }
        }
    };

    request.open("POST", "cartAdd.php", true);
    request.send(form);
}


function removeCart(id, cr_id) {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            if (request.responseText == "success") {

                window.location.reload();

            } else {
                alert(request.responseText);
            }

        }
    }


    request.open("GET", "cart_item_remove.php?cr_id=" + cr_id, true);
    request.send();


}




//single product page qty
function decreaseQuantity2(id) {
    var quantityInput = document.getElementById('quantityInput' + id);
    var currentValue = parseInt(quantityInput.value);
    // Check if the current value is greater than 1
    if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
        quantityChanged2(id);
    }
}

function increaseQuantity2(max, id) {
    var quantityInput = document.getElementById('quantityInput' + id);
    var currentValue = parseInt(quantityInput.value);
    var maxValue = parseInt(max);

    if (currentValue == maxValue) {
        alert("Max Qty Reached");
    } else {
        // Increment the value regardless of maximum limit
        quantityInput.value = currentValue + 1;
        quantityChanged2(id);
    }
}

var qty2 = 1
function quantityChanged2(id) {
    var quantityInput = document.getElementById('quantityInput' + id);
    qty2 = quantityInput.value;

    var form = new FormData();
    form.append("crt_id", id);
    form.append("qty", qty2);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            if (request.responseText == "Success") {

                window.location.reload();
            } else {
                alert(request.responseText);
            }

        }
    }

    request.open("POST", "cartQtyUpdate.php", true);
    request.send(form);


}
//END single product page qty


function addWish(p_id) {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            if (request.responseText == "Success") {

                window.location.reload();

            } else {
                alert(request.responseText);
            }

        }
    }


    request.open("GET", "wishlist_item_Add.php?wish_add_id=" + p_id, true);
    request.send();

}

function removewatchlist(id) {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            if (request.responseText == "Success") {

                window.location.reload();

            } else {
                alert(request.responseText);
            }

        }
    }


    request.open("GET", "wishlist_item_remove.php?wish_id=" + id, true);
    request.send();
}



function BuyNowProcess(id) {

    var Pid = id;

    var form = new FormData();
    form.append("P_id", Pid);
    form.append("qty", qty);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            if (request.status == 200) {


                var response = request.responseText;

                if (response == "Success") {

                    window.location = "checkout.php";

                } else if (response == "No user In session") {

                    window.location = "login.php";

                } else {

                    alert("An error occurred: " + response);

                }

            } else {
                alert("An error occurred while processing your request.");
            }
        }
    };

    request.open("POST", "buyNow.php", true);
    request.send(form);
}

function FinalPaymentProcess(delivery, total) {

    const mobile = document.getElementById("input-telephone").value;
    const postal = document.getElementById("input-postcode").value;
    var cart = "cart";

    const mobilePattern = /^[0-9]{10}$/; // Pattern for 10-digit mobile number
    const postalPattern = /^[0-9]{5}$/; // Pattern for 5-digit postal code

    if (mobilePattern.test(mobile)) {
        // Validate postal code
        if (postalPattern.test(postal)) {
            var form = new FormData();
            form.append("delivery", delivery);
            form.append("mobile", mobile);
            form.append("postal", postal);
            form.append("cart", cart);

            var request = new XMLHttpRequest();

            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    var response = request.responseText;
                    var payment = JSON.parse(response);
                    doCheckout(payment, "Paymentnotify.php");
                }
            };

            request.open("POST", "paymentProcess.php", true);
            request.send(form);

        } else {
            alert("Please enter a valid postal code (5 digits).");
        }
    } else {
        alert("Please enter a valid mobile number (10 digits).");
    }
}


function doCheckout(payment, path) {
    // Configure PayHere.js event handlers

    // Payment completed
    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);

        var f = new FormData();
        f.append("payment", JSON.stringify(payment));

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var response = request.responseText;
                var order = JSON.parse(response);

                // alert(response);
                // console.log(response);
                if (order.resp == "Success") {

                    window.location = "invoice.php?orderId=" + order.order_id; // Redirect to invoice page on success

                } else {

                    alert(response); // Show error message on failure
                }
            }
        };

        request.open("POST", path, true);
        request.send(f);
    };

    // Payment window closed
    payhere.onDismissed = function onDismissed() {
        console.log("Payment dismissed");
        // Handle case where user dismisses payment window
    };

    // Error occurred
    payhere.onError = function onError(error) {
        console.log("Error:" + error);
        // Handle error scenarios
    };

    // Start PayHere payment process
    payhere.startPayment(payment);
}

function singleItemBuy(pId, qty, delivery) {

    const mobile = document.getElementById("input-telephone").value;
    const postal = document.getElementById("input-postcode").value;

    const mobilePattern = /^[0-9]{10}$/; // Pattern for 10-digit mobile number
    const postalPattern = /^[0-9]{5}$/; // Pattern for 5-digit postal code

    if (mobilePattern.test(mobile)) {
        // Validate postal code
        if (postalPattern.test(postal)) {
            var form = new FormData();
            form.append("delivery", delivery);
            form.append("mobile", mobile);
            form.append("postal", postal);
            form.append("pId", pId);
            form.append("qty", qty);

            var request = new XMLHttpRequest();

            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    var response = request.responseText;
                    var payment = JSON.parse(response);
                    payment.p_id = pId;
                    payment.qty = qty;
                    doCheckout(payment, "Paymentnotify.php");
                }
            };

            request.open("POST", "paymentProcess.php", true);
            request.send(form);

        } else {
            alert("Please enter a valid postal code (5 digits).");
        }
    } else {
        alert("Please enter a valid mobile number (10 digits).");
    }

}


// function generatePDF() {
//     const { jsPDF } = window.jspdf;
//     html2canvas(document.getElementById('invoicePDF')).then(canvas => {
//         const imgData = canvas.toDataURL('image/png');
//         const pdf = new jsPDF();

//         // Add the image to the PDF
//         pdf.addImage(imgData, 'PNG', 10, 10, 190, 0);

//         // Open the PDF in a new window
//         const pdfDataUri = pdf.output('datauristring');
//         window.open(pdfDataUri);
//     });
// }


var filterSize = 0;
var filterColor = 0;

function sizePickerFilter(sizeId) {

    filterSize = sizeId;

}

function colourPickerFilter(colorId) {

    filterColor = colorId;

}


$(document).ready(function () {
    $('#filter').on('click', function () {

        // Retrieve the values of the input fields with IDs 'amount-min' and 'amount-max'
        const minAmount = document.getElementById('amount-min').value;
        const maxAmount = document.getElementById('amount-max').value;
        const brandSelection = document.getElementById('brandSelection').value;
        const categorySelection = document.getElementById('filterCategory').value;
        const sortId = document.getElementById('SortBy').value;
        // alert(sortId);

        // alert(minAmount);
        // alert(maxAmount);
        // alert(brandSelection);
        // alert(categorySelection);
        // alert(filterSize);
        // alert(filterColor);

        const formData = new FormData();

        formData.append("minAmmount", minAmount);
        formData.append("maxAmount", maxAmount);
        formData.append("brandSelection", brandSelection);
        formData.append("categorySelection", categorySelection);
        formData.append("filterSize", filterSize);
        formData.append("filterColor", filterColor);
        formData.append("sort", sortId);


        var request = new XMLHttpRequest;
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {

                let response = request.responseText;

                document.getElementById("gridView").innerHTML = response;


            }
        }

        request.open("POST", "filteringProcess.php", true);
        request.send(formData);



    });
});


function sortItems() {

    // Retrieve the values of the input fields with IDs 'amount-min' and 'amount-max'
    const minAmount = document.getElementById('amount-min').value;
    const maxAmount = document.getElementById('amount-max').value;
    const brandSelection = document.getElementById('brandSelection').value;
    const categorySelection = document.getElementById('filterCategory').value;
    const sortId = document.getElementById('SortBy').value;
    // alert(sortId);

    // alert(minAmount);
    // alert(maxAmount);
    // alert(brandSelection);
    // alert(categorySelection);
    // alert(filterSize);
    // alert(filterColor);

    const formData = new FormData();

    formData.append("minAmmount", minAmount);
    formData.append("maxAmount", maxAmount);
    formData.append("brandSelection", brandSelection);
    formData.append("categorySelection", categorySelection);
    formData.append("filterSize", filterSize);
    formData.append("filterColor", filterColor);
    formData.append("sort", sortId);


    var request = new XMLHttpRequest;
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            let response = request.responseText;

            document.getElementById("gridView").innerHTML = response;


        }
    }

    request.open("POST", "filteringProcess.php", true);
    request.send(formData);




}


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
    request.open("GET", "signOut.php", true);

    // Send the request
    request.send();



}
