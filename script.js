function changeView() {

    var signupbox = document.getElementById("signupbox");
    var signinbox = document.getElementById("signinbox");

    signupbox.classList.toggle("d-none");
    signinbox.classList.toggle("d-none");
}

function f1(){
    alert ("Please Sign In First !");
}

function signout() {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {

                window.location.reload();
                // window.location = "home.php";

            } else {
                alert(t);
            }
        }
    };

    r.open("GET", "signoutprocess.php", true);
    r.send();
}

function signup() {

    var f = document.getElementById("f");
    var l = document.getElementById("l");
    var e = document.getElementById("e");
    var p = document.getElementById("p");
    var g = document.getElementById("g");

    var form = new FormData();
    form.append("f", f.value);
    form.append("l", l.value);
    form.append("e", e.value);
    form.append("p", p.value);
    form.append("m", m.value);
    form.append("g", g.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text = request.responseText;
            if (text == "Success") {

                document.getElementById("msg").innerHTML = text;
                document.getElementById("msg").className = "bi bi-check2-circle fs-5";
                document.getElementById("alertdiv").className = " alert alert-success";
                document.getElementById("msgdiv").className = " d-block";
                alert("Sign Up Process Success !");
                changeView();

            } else {
                document.getElementById("msg").innerHTML = text;
                document.getElementById("msgdiv").className = "d-block";

            }
        }
    }

    request.open("POST", "signupprocess.php", true);
    request.send(form);
}

function signIn() {

    var email = document.getElementById("email2");
    var password = document.getElementById("password2");
    var rememberme = document.getElementById("rememberme");

    var f = new FormData();
    f.append("e", email.value);
    f.append("p", password.value);
    f.append("r", rememberme.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                window.location = "home.php";
            } else {
                document.getElementById("msg2").innerHTML = t;
            }

        }
    };

    r.open("POST", "signinprocess.php", true);
    r.send(f);

}

var bm;
function forgotPassword() {

    var email = document.getElementById("email2");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                alert("Verification code has sent to your email. Please check your inbox");
                var m = document.getElementById("forgotPasswordModal");
                bm = new bootstrap.Modal(m);
                bm.show();
            } else {
                alert(t);
            }

        }
    }

    r.open("GET", "forgotpasswordprocess.php?e=" + email.value, true);
    r.send();

}

function showpassword1() {

    var i = document.getElementById("npi");
    var eye = document.getElementById("e1");

    if (i.type == "password") {
        i.type = "text";
        eye.className = "bi bi-eye-fill";
    } else {
        i.type = "password";
        eye.className = "bi bi-eye-slash-fill";
    }
}

function showpassword2() {

    var i = document.getElementById("rnp");
    var eye = document.getElementById("e2");

    if (i.type == "password") {
        i.type = "text";
        eye.className = "bi bi-eye-fill";
    } else {
        i.type = "password";
        eye.className = "bi bi-eye-slash-fill";
    }

}

function resetpw() {

    var email = document.getElementById("email2");
    var np = document.getElementById("npi");
    var rnp = document.getElementById("rnp");
    var vcode = document.getElementById("vc");

    var f = new FormData();
    f.append("e", email.value);
    f.append("n", np.value);
    f.append("r", rnp.value);
    f.append("v", vcode.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {

                bm.hide();
                alert("Password reset success");
            } else {
                alert(t);
            }

        }
    };

    r.open("POST", "resetpassword.php", true);
    r.send(f);
}

function updateprofile() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");
    var province = document.getElementById("province");
    var district = document.getElementById("district");
    var city = document.getElementById("city");
    var pcode = document.getElementById("pcode");
    var image = document.getElementById("profileimg");

    var f = new FormData();
    f.append("fn", fname.value);
    f.append("ln", lname.value);
    f.append("m", mobile.value);
    f.append("l1", line1.value);
    f.append("l2", line2.value);
    f.append("p", province.value);
    f.append("d", district.value);
    f.append("c", city.value);
    f.append("pcode", pcode.value);

    if (image.files.length == 0) {

        var confirmation = confirm("Are you sure You don't want to update profile image ? ");

        if (confirmation) {
            alert("you have not selected any image.");
        }

    } else {
        f.append("image", image.files[0]);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);
            window.location.reload();
        }
    };

    r.open("POST", "updateprofileprocess.php", true);
    r.send(f);

}

function changeproductimage() {
    var image = document.getElementById("imageuploader");

    image.onchange = function () {

        var file_count = image.files.length;

        if (file_count <= 3) {

            for (var x = 0; x < file_count; x++) {
                var file = this.files[x];
                var url = window.URL.createObjectURL(file);

                document.getElementById("i" + x).src = url;
            }

        } else {
            alert("Please select 3 or less than 3 images.");
        }
    }
}

function addProduct() {

    var category = document.getElementById("category");
    var brand = document.getElementById("brand");
    var model = document.getElementById("model");
    var title = document.getElementById("title");

    var condition = 0;
    if (document.getElementById("b").checked) {
        condition = 1;
    } else if (document.getElementById("u").checked) {
        condition = 2;
    }

    var colour = document.getElementById("clr");
   
    var qty = document.getElementById("qty");
    var cost = document.getElementById("cost");
    var dwc = document.getElementById("dwc");
    var doc = document.getElementById("doc");
    var desc = document.getElementById("desc");
    var image = document.getElementById("imageuploader");

    var f = new FormData();

    f.append("ca", category.value);
    f.append("b", brand.value);
    f.append("m", model.value);
    f.append("t", title.value);
    f.append("con", condition);
    f.append("col", colour.value);
   
    f.append("qty", qty.value);
    f.append("cost", cost.value);
    f.append("dwc", dwc.value);
    f.append("doc", doc.value);
    f.append("desc", desc.value);

    var file_count = image.files.length;

    for (var x = 0; x < file_count; x++) {
        f.append("image" + x, image.files[x]);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Product Image saved success !") {

                alert("Product saved success !");
                window.location.reload();

            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "addproductprocess.php", true);
    r.send(f);
}

function changestatus(id) {

    var product_id = id;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "deactivated") {

                alert("Product Deactivated");
                window.location.reload();

            } else if (t == "activated") {

                alert("Product Activated");
                window.location.reload();

            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "changestatusprocess.php?p=" + product_id, true);
    r.send();

}

function sort1(x) {

    // var search = document.getElementById("s");
    var time;

    if (document.getElementById("n").checked) {
        time = "1";
    } else if (document.getElementById("o").checked) {
        time = "2";
    } else {
        time = 0;
    }

    var qty = 0;

    if (document.getElementById("h").checked) {
        qty = "1";
    } else if (document.getElementById("l").checked) {
        qty = "2";
    }
    // else{
    //     qty = 0;
    // }

    var condition;

    if (document.getElementById("b").checked) {
        condition = "1";
    } else if (document.getElementById("u").checked) {
        condition = "2";
    } else {
        condition = 0;
    }

    var f = new FormData();
    f.append("t", time);
    f.append("q", qty);
    f.append("c", condition);
    f.append("page", x);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            document.getElementById("sort").innerHTML = t;
        }
    }

    r.open("POST", "sortprocess.php", true);
    r.send(f);

}

function clearsort() {
    window.location.reload();
}

function sendid(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "update.php";
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "sendProductIdProcess.php?id=" + id, true);
    r.send();
}

function updateproduct() {

    var title = document.getElementById("t");
    var qty = document.getElementById("q");
    var delivery_within_colombo = document.getElementById("dwc");
    var delivery_outof_colombo = document.getElementById("doc");
    var description = document.getElementById("d");
    var images = document.getElementById("imageuploader");

    var f = new FormData();
    f.append("t", title.value);
    f.append("q", qty.value);
    f.append("dwc", delivery_within_colombo.value);
    f.append("doc", delivery_outof_colombo.value);
    f.append("d", description.value);

    var img_count = images.files.length;

    for (var x = 0; x < img_count; x++) {
        f.append("i" + x, images.files[x]);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);
            window.location.reload();
        }
    }

    r.open("POST", "updateprocess.php", true);
    r.send(f);
}

function basicsearch(x) {

    var text = document.getElementById("basic_search_text");

    var f = new FormData();
    f.append("t", text.value);
    f.append("page", x);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("basicSearchResult").innerHTML = t;
        }
    }

    r.open("POST", "basicsearchprocess.php", true);
    r.send(f);
}

function advancedsearch(x) {
    var txt = document.getElementById("t");
    var category = document.getElementById("c1");
    var brand = document.getElementById("b");
    var model = document.getElementById("m");
    var condition = document.getElementById("c2");
    var colour = document.getElementById("c3");
    var pf = document.getElementById("pf");
    var pt = document.getElementById("pt");
    var sort = document.getElementById("s");

    var f = new FormData();
    f.append("t", txt.value);
    f.append("c", category.value);
    f.append("b", brand.value);
    f.append("m", model.value);
    f.append("con", condition.value);
    f.append("col", colour.value);
    f.append("pf", pf.value);
    f.append("pt", pt.value);
    f.append("s", sort.value);
    f.append("page", x);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("view_area").innerHTML = t;
        }
    }

    r.open("POST", "advancedsearchprocess.php", true);
    r.send(f);

}

function loadmainimg(id) {

    var img = document.getElementById("productimg" + id).src;
    var main = document.getElementById("mainimg");
    main.style.backgroundImage = "url(" + img + ")";
}

function checkvalue(qty) {
    var input = document.getElementById("qty_input");

    if (input.value <= 0) {
        alert("Quantity must be 1 or more");
        input.value = 1;
    } else if (input.value > qty) {
        alert("Maximum quantity achieved");
    }
}

function qty_inc(qty) {

    var input = document.getElementById("qty_input");
    if (input.value < qty) {
        var newvalue = parseInt(input.value) + 1;
        input.value = newvalue.toString();
    } else {
        alert("Maximum quantity has achieved");
        input.value = qty;
    }
}

function qty_dec(qty) {

    var input = document.getElementById("qty_input");
    if (input.value > 1) {
        var newvalue = parseInt(input.value) - 1;
        input.value = newvalue.toString();
    } else {
        alert("Minimum quantity has achieved");
        input.value = 1;
    }
}

function addwatchlist(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "removed") {
                document.getElementById("heart" + id).style.className = "text-dark";
                window.location.reload();
            } else if (t == "added") {
                document.getElementById("heart" + id).style.className = "text-danger";
                window.location.reload();
            } else {
                alert(t);
            }

        }
    }

    r.open("GET", "addtowatchlistprocess.php?id=" + id, true);
    r.send();
}

function removefromwatchlist(id) {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location.reload();
            } else {
                alert(t);
            }

        }
    }

    r.open("GET", "removewatchlistprocess.php?id=" + id, true);
    r.send();
}

function addtocart(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);
        }
    }

    r.open("GET", "addtocartprocess.php?id=" + id, true);
    r.send();

}

function deletefromcart(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                alert("Product removed from cart !");
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "deletefromcartprocess.php?id=" + id, true);
    r.send();
}

function viewMessages(email) {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("chat_box").innerHTML = t;
        }
    }

    r.open("GET", "viewMsgProcess.php?e=" + email, true);
    r.send();
}

function send_msg() {
    var recevr_mail = document.getElementById("rmail");
    var msg_txt = document.getElementById("msg_txt");

    var f = new FormData();
    f.append("rm", recevr_mail.innerHTML);
    f.append("mt", msg_txt.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                document.getElementById("chat_box").reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "sendmsgprocess.php", true);
    r.send(f);
}

function paynow(id) {

    var qty = document.getElementById("qty_input").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            var obj = JSON.parse(t);

            var mail = obj["mail"];
            var amount = obj["amount"];

            if (t == "1") {
                alert("Please log in or sign up !");
                window.location = "index.php";
            } else if (t == "2") {
                alert("Please update your profile first !");
                window.location = "userprofile.php";
            } else {

                // Payment completed. It can be a successful failure.
                payhere.onCompleted = function onCompleted(orderId) {

                    console.log("Payment completed. OrderID:" + orderId);

                    saveinvoice(orderId, id, mail, amount, qty);
                    // Note: validate the payment and show success or failure page to the customer
                };

                // Payment window closed
                payhere.onDismissed = function onDismissed() {
                    // Note: Prompt user to pay again or show an error page
                    console.log("Payment dismissed");
                };

                // Error occurred
                payhere.onError = function onError(error) {
                    // Note: show an error page
                    console.log("Error:" + error);
                };

                // Put the payment variables here
                var payment = {
                    "sandbox": true,
                    "merchant_id": "1221101",    // Replace your Merchant ID
                    "return_url": "http://localhost/shop/singleproduct.php?id" + id,     // Important
                    "cancel_url": "http://localhost/shop/singleproduct.php?id" + id,      // Important
                    "notify_url": "http://sample.com/notify",
                    "order_id": obj["id"],
                    "items": obj["item"],
                    "amount": amount,
                    "currency": "LKR",
                    "first_name": obj["fname"],
                    "last_name": obj["lname"],
                    "email": mail,
                    "phone": obj["mobile"],
                    "address": obj["address"],
                    "city": obj["city"],
                    "country": "Sri Lanka",
                    "delivery_address": obj["address"],
                    "delivery_city": obj["city"],
                    "delivery_country": "Sri Lanka",
                    "custom_1": "",
                    "custom_2": ""
                };

                // Show the payhere.js popup, when "PayHere Pay" is clicked
                // document.getElementById('payhere-payment').onclick = function (e) {
                payhere.startPayment(payment);
                // };

            }

        }
    }
    r.open("GET", "buynowprocess.php?id=" + id + "&qty=" + qty, true);
    r.send();
}

function saveinvoice(orderId, id, mail, amount, qty) {

    var f = new FormData();

    f.append("o", orderId);
    f.append("i", id);
    f.append("m", mail);
    f.append("a", amount);
    f.append("q", qty);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "1") {
                window.location = "invoice.php?id=" + orderId;
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "saveinvoice.php", true);
    r.send(f);
}

function printinvoice() {
    var body = document.body.innerHTML;
    var page = document.getElementById("page").innerHTML;
    document.body.innerHTML = page;
    window.print();
    document.body.innerHTML = body;
}

var md;
function addfeedback(id) {

    var feed = document.getElementById("feedbackmodel" + id);
    md = new bootstrap.Modal(feed);
    md.show();

}

function savefeedback(id) {

    var type;
    if (document.getElementById("type1").checked) {
        type = 1;
    } else if (document.getElementById("type2").checked) {
        type = 2;
    } else if (document.getElementById("type3").checked) {
        type = 3;
    }

    var feedback = document.getElementById("feed");

    var f = new FormData();
    f.append("t", type);
    f.append("pid", id);
    f.append("feed", feedback.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "1") {
                md.hide();
                alert("Saved Feedback.");
            } else {
                alert(t);
            }
        }
    }
    r.open("POST", "savefeedbackprocess.php", true);
    r.send(f);

}

var av;
function adminverification() {
    var email = document.getElementById("e");

    var f = new FormData();
    f.append("e", email.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                var adminVerificationModal = document.getElementById("verificationModal");
                av = new bootstrap.Modal(adminVerificationModal);
                av.show();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "adminverificationprocess.php", true);
    r.send(f);

}

function verify() {
    var verification = document.getElementById("vcode");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                av.hide();
                window.location = "adminpanel.php";
            } else {
                alert(t);
            }
        }
    }
    r.open("GET", "verificationprocess.php?v=" + verification.value, true);
    r.send();
}

function blockuser(email) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "blocked") {
                document.getElementById("ub" + email).innerHTML = "Unblock";
                document.getElementById("ub" + email).classList = "btn btn-success";
            } else if (t == "unblocked") {
                document.getElementById("ub" + email).innerHTML = "Block";
                document.getElementById("ub" + email).classList = "btn btn-danger";
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "userblockprocess.php?email=" + email, true);
    r.send();

}

var mm;
function viewmsgmodal(email) {
    var m = document.getElementById("usermsgmodal" + email);
    mm = new bootstrap.Modal(m);
    mm.show();
}

function blockProduct(id) {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var txt = request.responseText;
            if (txt == "blocked") {
                document.getElementById("pb" + id).innerHTML = "Unblock";
                document.getElementById("pb" + id).classList = "btn btn-success";
            } else if (txt == "unblocked") {
                document.getElementById("pb" + id).innerHTML = "Block";
                document.getElementById("pb" + id).classList = "btn btn-danger";
            } else {
                alert(txt);
            }
        }
    }

    request.open("GET", "productblockprocess.php?id=" + id, true);
    request.send();

}

var pm;
function viewproductmodal(id) {
    var m = document.getElementById("viewproductmodal" + id);
    pm = new bootstrap.Modal(m);
    pm.show();

}

var cm;
function addnewcategory() {
    var m = document.getElementById("addcategorymodal");
    cm = new bootstrap.Modal(m);
    cm.show();
}

var vc;
var e;
var n;
function verifycategory() {
    var ncm = document.getElementById("addcategoryverificationmodal");
    vc = new bootstrap.Modal(ncm);

    e = document.getElementById("e").value;
    n = document.getElementById("n").value;

    var f = new FormData();
    f.append("email", e);
    f.append("name", n);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                cm.hide();
                vc.show();
            } else {
                alert(t);
            }
        }
    }
    r.open("POST", "addnewcategoryprocess.php", true);
    r.send(f);

}

function savecategory() {
    var text = document.getElementById("text").value;

    var f = new FormData();
    f.append("t", text);
    f.append("e", e);
    f.append("n", n);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                vc.hide();
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }
    r.open("POST", "savecategoryprocess.php", true);
    r.send(f);
}

function changestatus2(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == 1) {
                document.getElementById("btn" + id).innerHTML = "Packing";
                document.getElementById("btn" + id).classList = "btn btn-warning fw-bold mt-1 mb-1";
            } else if (t == 2) {
                document.getElementById("btn" + id).innerHTML = "Dispatch";
                document.getElementById("btn" + id).classList = "btn btn-info fw-bold mt-1 mb-1";
            } else if (t == 3) {
                document.getElementById("btn" + id).innerHTML = "Shipping";
                document.getElementById("btn" + id).classList = "btn btn-primary fw-bold mt-1 mb-1";
            } else if (t == 4) {
                document.getElementById("btn" + id).innerHTML = "Delivered";
                document.getElementById("btn" + id).classList = "btn btn-danger fw-bold mt-1 mb-1r";
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "changestatusprocess2.php?id=" + id, true);
    r.send();
}

function searchinvoiceid() {
    var text = document.getElementById("searchtext").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("viewarea").innerHTML = t;
        }
    }

    r.open("GET", "searchinvoiceidprocess.php?id=" + text, true);
    r.send();
}

function findsellings() {

    var from = document.getElementById("from").value;
    var to = document.getElementById("to").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("viewarea").innerHTML = t;
        }
    }

    r.open("GET", "findsellingprocess.php?f=" + from + "&t=" + to, true);
    r.send();
}

var cam;
function contactadmin(email) {
    var m = document.getElementById("contactadmin");
    cam = new bootstrap.Modal(m);
    cam.show();
}

function sendadminmsg() {
    var text = document.getElementById("msgtext").value;

    var f = new FormData();
    f.append("t", text);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);
        }
    }

    r.open("POST", "sendadminmsgprocess.php", true);
    r.send(f);
}

function sendadminmsg(email) {
    var text = document.getElementById("msgtext").value;

    var f = new FormData();
    f.append("t", text);
    f.append("r", email);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);
        }
    }

    r.open("POST", "sendadminmsgprocess.php", true);
    r.send(f);
}
