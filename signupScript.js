function validate() {
    // checking and wrong for empty feilds in first name  
    let fnameTest = document.myForm.fname.value.search(/[a-zA-Z]/g)
    if (document.myForm.fname.value == "" || fnameTest == -1) {
        alert("First name can only be letters");
        document.myForm.fname.focus();
        return false;
    }

    // checking and wrong for empty feilds in first name  
    let lnameTest = document.myForm.lname.value.search(/[a-zA-Z]/g)
    if (document.myForm.lname.value == "" || lnameTest == -1) {
        alert("First name can only be letters");
        document.myForm.lname.focus();
        return false;
    }


    // checking and wrong for empty feilds in email 
    let emailTest = document.myForm.email.value.search(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@(ashesi.edu.gh)$/)
    if (document.myForm.email.value == "" || emailTest == -1) {
        alert("Enter your Ashesi email!");
        document.myForm.email.focus();
        return false;
    }


    // check if the lenght of the student is 8 
    if (document.myForm.student_id.value == "" || isNaN(document.myForm.student_id.value) ||
        document.myForm.student_id.value.length != 8) {

        alert("Null or incorrect Student Id");
        document.myForm.student_id.focus();
        return false;
    }


    // checking for empty feilds in gender
    if (document.myForm.gender.value == "") {
        alert("Select your gender!");
        document.myForm.gender.focus();
        return false;
    }

    // checking for empty feilds in class
    if (document.myForm.class.value == "-1") {
        alert("Please provide your Class!");
        return false;
    }


    // checking whether digits of the student id  matches this class year group
    let lastFourDigits = document.myForm.student_id.value.substr(-4);
    if (document.myForm.class.value !== lastFourDigits) {
        alert("ID number does not match class!");
        document.myForm.student_id.focus();
        return false;
    }

    // checking for empty feilds in club name
    if (document.myForm.club_name.value == "-1") {
        alert("Choose your club!");
        return false;
    }
    return (true);

}