var x, i, j, selElmnt, a, b, c;
/* Look for any elements with the class "custom-select": */
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    /* For each element, create a new DIV that will act as the selected item: */
    a = document.createElement("DIV");
    a.setAttribute("class", "select-selected");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    /* For each element, create a new DIV that will contain the option list: */
    b = document.createElement("DIV");
    b.setAttribute("class", "select-items select-hide");
    for (j = 1; j < selElmnt.length; j++) {
        /* For each option in the original select element,
        create a new DIV that will act as an option item: */
        c = document.createElement("DIV");
        c.innerHTML = selElmnt.options[j].innerHTML;
        c.addEventListener("click", function (e) {
            /* When an item is clicked, update the original select box,
            and the selected item: */
            var y, i, k, s, h;
            s = this.parentNode.parentNode.getElementsByTagName("select")[0];
            h = this.parentNode.previousSibling;
            for (i = 0; i < s.length; i++) {
                if (s.options[i].innerHTML == this.innerHTML) {
                    s.selectedIndex = i;
                    h.innerHTML = this.innerHTML;
                    y = this.parentNode.getElementsByClassName("same-as-selected");
                    for (k = 0; k < y.length; k++) {
                        y[k].removeAttribute("class");
                    }
                    this.setAttribute("class", "same-as-selected");
                    break;
                }
            }
            h.click();
        });
        b.appendChild(c);
    }
    x[i].appendChild(b);
    a.addEventListener("click", function (e) {
        /* When the select box is clicked, close any other select boxes,
        and open/close the current select box: */
        e.stopPropagation();
        closeAllSelect(this);
        this.nextSibling.classList.toggle("select-hide");
        this.classList.toggle("select-arrow-active");
    });
}

function closeAllSelect(elmnt) {
    /* A function that will close all select boxes in the document,
    except the current select box: */
    var x, y, i, arrNo = [];
    x = document.getElementsByClassName("select-items");
    y = document.getElementsByClassName("select-selected");
    for (i = 0; i < y.length; i++) {
        if (elmnt == y[i]) {
            arrNo.push(i)
        } else {
            y[i].classList.remove("select-arrow-active");
        }
    }
    for (i = 0; i < x.length; i++) {
        if (arrNo.indexOf(i)) {
            x[i].classList.add("select-hide");
        }
    }
}

/* If the user clicks anywhere outside the select box,
then close all select boxes: */
document.addEventListener("click", closeAllSelect);


function checkPass() {

    var pass1 = $("#register-form #password1");
    var pass2 = $("#register-form #password2");

    console.log();


    if (pass1.val() != "") {


        if (pass1.val() == pass2.val()) {
            document.getElementById("password2").classList.remove("errado");
            document.getElementById("password2").classList.add("certo");
            document.getElementById("confir").value = 1;


        } else {
            document.getElementById("password2").classList.add("errado");
            document.getElementById("confir").value = 0;

        }
    } else {
        document.getElementById("password2").classList.remove("errado");
        document.getElementById("password2").classList.remove("certo");

    }

}

function checkPassReq() {
    var pass = $("#register-form #password1");

    if (pass.val() != "") {

        if (pass.val() == pass.val().toLowerCase()) {

            document.getElementById("Mc").style.display = "block";
        } else {
            document.getElementById("Mc").style.display = "none";

        }

        if (pass.val().length < 6) {

            document.getElementById("6c").style.display = "block";


        } else {
            document.getElementById("6c").style.display = "none";
        }

        if (/\d/.test(pass.val()) == false) {

            document.getElementById("Nc").style.display = "block";

        } else {
            document.getElementById("Nc").style.display = "none";

        }

        var regex = /^[A-Za-z0-9 ]+$/;
        var isValid = regex.test(pass.val());


        if (!isValid) {
            document.getElementById("Sc").style.display = "none";
        } else {
            document.getElementById("Sc").style.display = "block";
        }


        if (pass.val() != pass.val().toLowerCase() && pass.val().length >= 6 && /\d/.test(pass.val()) == true && !isValid) {

            document.getElementById("requi").value = 1;
        } else {
            document.getElementById("requi").value = 0;
        }
    } else {
        document.getElementById("Nc").style.display = "none";
        document.getElementById("6c").style.display = "none";
        document.getElementById("Mc").style.display = "none";
        document.getElementById("Sc").style.display = "none";


    }
}

