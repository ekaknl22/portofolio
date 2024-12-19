// Kode untuk slideshow gambar
var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n){
        showDivs((slideIndex += n));
    }

    function showDivs(n){
        var i;
        var imgList = document.getElementsByClassName("img-slideshow");
        if(n > imgList.length) slideIndex = 1;
        else if(n < 1) slideIndex = imgList.length;

        for(i = 0; i < imgList.length; i++){
            imgList[i].style.display = "none";
        }

        imgList[slideIndex-1].style.display = "block";
    }

    setInterval(() => {
        plusDivs(1);
    }, 1000);

// Kode untuk validasi form
function validateForm(){
    const name = document.forms["form"]["name"].value;
    const email = document.forms["form"]["email"].value;
    const option = document.forms["form"]["option"].value;

    if(name === ""){
        document.getElementById("error-name").innerHTML = "Name must be filled!";
        return false;
    }

    if(email === ""){
        document.getElementById("error-email").innerHTML = "Email must be filled!";
        return false;
    }

    if(option === ""){
        document.getElementById("error-option").innerHTML = "Please select what you are interested in!";
        return false;
    }

    alert("Form submitted succesfully!");
    return true;
}