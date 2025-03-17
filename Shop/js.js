function reg() {

    var FN = document.getElementById("FirstName").value;
    var Ln = document.getElementById("LastName").value;
    var mail = document.getElementById("CustomerEmail").value;
    var password = document.getElementById("CustomerPassword").value;
    var ConPassword = document.getElementById("ConfirmPassword").value;

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
                console.log(request.responseText);
            }

        }
    }


    request.open("GET", "SignIn.php?m=" + mail + "&p=" + ps, true);
    request.send();
}


function details() {
    var fn = document.getElementById("first-name").value;
    var ln = document.getElementById("last-name").value;
    var mobile = document.getElementById("mobile").value;
    var pro = document.getElementById("pro").value;
    var dis = document.getElementById("dis").value;
    var city = document.getElementById("city").value;
    var ad1 = document.getElementById("ad1").value;
    var ad2 = document.getElementById("ad2").value;

    new form = new FormData();
    formData.append("fn", fn);
    formData.append("ln", ln);
    formData.append("mobile", mobile);
    formData.append("pro", pro);
    formData.append("dis", dis);
    formData.append("city", city);
    formData.append("ad1", ad1);
    formData.append("ad2", ad2);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            if (request.responseText == "OK") {
                alert("ok");
                window.location.reload();
            } else {
                alert(request.responseText);
            }

        }
    }

    request.open("POST", "UpdateProfile.php", true);
    request.send(form);
}
