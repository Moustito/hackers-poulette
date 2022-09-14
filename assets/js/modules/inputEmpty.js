export function inputEmpty(input) {
    if (input.value == "") {
        input.style.borderBottom = "1px solid red";
    } else {
        input.style.borderBottom = "1px solid black";
    }
}