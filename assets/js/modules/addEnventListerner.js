import { inputEmpty } from "./inputEmpty.js";

let name = document.getElementById('name')
let firstname = document.getElementById('firstname')
let email = document.getElementById('email')
let description = document.getElementById('description')

export function addEnventListener() {
    name.addEventListener("keyup", (event) => {
        inputEmpty(name);

    })
    document.getElementById('firstname').addEventListener("keyup", (event) => {
        inputEmpty(firstname);
    })
    document.getElementById('email').addEventListener("keyup", (event) => {
        inputEmpty(email);
    })
    document.getElementById('description').addEventListener("keyup", (event) => {
        inputEmpty(description);
    })
}
