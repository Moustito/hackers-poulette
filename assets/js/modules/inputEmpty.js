export function inputEmpty(input) {
    if (input.value == "") {
        input.style.border = "2px solid red";
    } else {
        input.style.border = "2px solid black";
    }
}