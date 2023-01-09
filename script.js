let sub = document.getElementsByClassName("sub");
sub = Array.from(sub);
console.log(sub);
for (let i = 0; i < sub.length; i++) {

    sub[i].addEventListener('mouseover', () => {
        sub[i].style.backgroundColor = "#FB938D";
    })

    sub[i].addEventListener('mouseout', () => {
        sub[i].style.backgroundColor = "#EFEFEF";
    })
}