let sub = document.getElementsByClassName("sub");
let start = document.querySelector("#start");
let how = document.querySelector("#howto");
let cnt = 0;
console.log(how);
console.log(start);
for (let i = 0; i < sub.length; i++) {

    sub[i].addEventListener('mouseover', () => {
        sub[i].style.backgroundColor = "#FB938D";
    })

    sub[i].addEventListener('mouseout', () => {
        sub[i].style.backgroundColor = "#EFEFEF";
    })
}

// window.addEventListener('click', () => {
//     if (cnt == 1) {
//         how.classList.remove("active");
//         cnt = 0;
//         console.log(cnt);
//     }
// })

start.addEventListener('click', () => {
    if (cnt == 0) {
        how.classList.add("active");
        cnt = 1;
        console.log(cnt);
    }
})
