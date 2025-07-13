const form = document.querySelector("form"),
        nextBtn = form.querySelector(".nextBtn"),
        backBtn = form.querySelector(".backBtn"),
        submitBtn = form.querySelector(".submitBtn"),
        allInput = form.querySelectorAll(".first input");
        const sameAddressCheckbox = document.getElementById("sameAddress");


nextBtn.addEventListener("click", ()=> {
    allInput.forEach(input => {
        if(input.value != ""){
            form.classList.add('secActive');
        }else{
            form.classList.remove('secActive');
        }
    })
})

backBtn.addEventListener("click", () => form.classList.remove('secActive'));



sameAddressCheckbox.addEventListener("change", function () {
    if (this.checked) {
        document.getElementById("streetAddress").value = document.querySelector("input[placeholder='Street Address']").value;
        document.getElementById("addressLine2").value = document.querySelector("input[placeholder='Street Address Line 2']").value;
        document.getElementById("permanentState").value = document.querySelector("select[name='stdcurrstate']").value;
        document.getElementById("district").value = document.querySelector("input[placeholder='District']").value;
        document.getElementById("postOffice").value = document.querySelector("input[placeholder='Post Office']").value;
        document.getElementById("perrZIP").value = document.querySelector("input[placeholder='Zip Code']").value;
    } else {
        document.getElementById("streetAddress").value = "";
        document.getElementById("addressLine2").value = "";
        document.getElementById("permanentState").value = "";
        document.getElementById("district").value = "";
        document.getElementById("postOffice").value = "";
        document.getElementById("perrZIP").value = "";
    }
});