export function addEnventListener() {
    document.getElementsByClassName('input').addEnventListener("keyup", (event) => {
        console.log("event");
    });
}
console.log("launch module");